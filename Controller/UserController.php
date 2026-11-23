<?php
/**
 * Controller/UserController.php
 * User management for administrators: list / search / create / update / delete accounts.
 * Reuses the validation, CSRF and DB connection of AuthController.
 *
 * Business rules:
 *  - only ADMIN can manage accounts (checked by requireRole() in index.php on every route)
 *  - passwords are always hashed with password_hash()
 *  - an admin cannot change their own role nor delete their own account from this screen
 *  - the platform always keeps at least one ADMIN (cannot demote / delete the last one)
 */
require_once __DIR__ . '/AuthController.php';

class UserController extends AuthController
{
    /** @return UserModel[] */
    public function getUsers(string $search = '', string $role = ''): array
    {
        $sql = 'SELECT * FROM users WHERE 1=1';
        $params = [];
        if ($search !== '') {
            $sql .= ' AND (full_name LIKE :q1 OR email LIKE :q2 OR phone LIKE :q3)';
            $params['q1'] = $params['q2'] = $params['q3'] = '%' . $search . '%';
        }
        if (in_array($role, UserModel::ROLES, true)) {
            $sql .= ' AND role = :role';
            $params['role'] = $role;
        }
        $sql .= ' ORDER BY created_at DESC, id DESC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return array_map(fn(array $row) => UserModel::fromArray($row), $stmt->fetchAll());
    }

    public function countAllUsers(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM users')->fetchColumn();
    }

    // ==============================================================
    // CREATE (admin can choose the role; password hashed)
    // ==============================================================
    public function create(array $post): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        [$errors, $clean] = $this->validateUserFields($post, 'required');
        $role = (string) ($post['role'] ?? '');
        if (!in_array($role, UserModel::ROLES, true)) {
            $errors['role'] = 'Choose a valid role.';
        }
        if ($errors) {
            return $errors;
        }
        $user = new UserModel();
        $user->setFullName($clean['full_name']);
        $user->setEmail($clean['email']);
        $user->setPassword(password_hash($clean['password'], PASSWORD_DEFAULT));
        $user->setPhone($clean['phone']);
        $user->setGovernorate($clean['governorate']);
        $user->setRole($role);
        $user->setIsVerified(!empty($post['is_verified']));
        return $this->insertUser($user) ? [] : ['form' => 'The account could not be created.'];
    }

    // ==============================================================
    // UPDATE (password optional: empty = unchanged)
    // ==============================================================
    public function update(int $id, array $post, int $currentAdminId): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        $target = $this->findById($id);
        if (!$target) {
            return ['form' => 'This account no longer exists.'];
        }
        [$errors, $clean] = $this->validateUserFields($post, 'optional', $id);
        $role = (string) ($post['role'] ?? '');
        if (!in_array($role, UserModel::ROLES, true)) {
            $errors['role'] = 'Choose a valid role.';
        } elseif ($id === $currentAdminId && $role !== $target->getRole()) {
            $errors['role'] = 'You cannot change your own role.';
        } elseif ($target->getRole() === 'ADMIN' && $role !== 'ADMIN' && $this->countByRole('ADMIN') <= 1) {
            $errors['role'] = 'This is the last administrator: the platform needs at least one.';
        }
        if ($errors) {
            return $errors;
        }

        $sql = 'UPDATE users SET full_name = :full_name, email = :email, phone = :phone, governorate = :governorate,
                role = :role, is_verified = :is_verified';
        $params = [
            'full_name' => $clean['full_name'], 'email' => $clean['email'], 'phone' => $clean['phone'],
            'governorate' => $clean['governorate'], 'role' => $role,
            'is_verified' => !empty($post['is_verified']) ? 1 : 0, 'id' => $id,
        ];
        if ($clean['password'] !== '') {
            $sql .= ', password = :password';
            $params['password'] = password_hash($clean['password'], PASSWORD_DEFAULT);
        }
        $stmt = $this->db->prepare($sql . ' WHERE id = :id');
        $stmt->execute($params);
        if ($id === $currentAdminId) {
            $_SESSION['full_name'] = $clean['full_name'];
        }
        return [];
    }

    // ==============================================================
    // DELETE
    // ==============================================================
    public function delete(int $id, array $post, int $currentAdminId): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        if ($id === $currentAdminId) {
            return ['form' => 'You cannot delete your own account from this list (use "My profile").'];
        }
        $target = $this->findById($id);
        if (!$target) {
            return ['form' => 'This account no longer exists.'];
        }
        if ($target->getRole() === 'ADMIN' && $this->countByRole('ADMIN') <= 1) {
            return ['form' => 'The last administrator cannot be deleted.'];
        }
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return [];
    }
}
