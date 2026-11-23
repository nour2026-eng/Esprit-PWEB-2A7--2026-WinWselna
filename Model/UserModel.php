<?php
/**
 * Model/UserModel.php
 * Represents ONE user. Only private attributes + getters/setters + fromArray().
 * No SQL and no business logic here (that belongs to the controllers).
 */
class UserModel
{
    // ------------------------------------------------------------
    // ATTRIBUTES
    // ------------------------------------------------------------
    private int $id = 0;
    private string $fullName = '';
    private string $email = '';
    private string $password = '';
    private string $phone = '';
    private string $governorate = '';
    private string $role = 'CLIENT';
    private bool $isVerified = false;
    private string $createdAt = '';

    public const ROLES = ['CLIENT', 'AGENT', 'ADMIN'];

    // ------------------------------------------------------------
    // CONSTRUCTOR
    // ------------------------------------------------------------
    public function __construct()
    {
    }

    // ------------------------------------------------------------
    // GETTERS
    // ------------------------------------------------------------
    public function getId(): int { return $this->id; }
    public function getFullName(): string { return $this->fullName; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string { return $this->password; }
    public function getPhone(): string { return $this->phone; }
    public function getGovernorate(): string { return $this->governorate; }
    public function getRole(): string { return $this->role; }
    public function isVerified(): bool { return $this->isVerified; }
    public function getCreatedAt(): string { return $this->createdAt; }

    /** Initials for the avatar, e.g. "Ahmed Ben Salah" → "AB" */
    public function getInitials(): string
    {
        $parts = preg_split('/\s+/u', trim($this->fullName)) ?: [];
        $ini = '';
        foreach (array_slice($parts, 0, 2) as $p) {
            $ini .= mb_strtoupper(mb_substr($p, 0, 1));
        }
        return $ini !== '' ? $ini : '?';
    }

    // ------------------------------------------------------------
    // SETTERS
    // ------------------------------------------------------------
    public function setId(int $id): void { $this->id = $id; }
    public function setFullName(string $fullName): void { $this->fullName = $fullName; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setPassword(string $password): void { $this->password = $password; }
    public function setPhone(string $phone): void { $this->phone = $phone; }
    public function setGovernorate(string $governorate): void { $this->governorate = $governorate; }
    public function setRole(string $role): void { $this->role = $role; }
    public function setIsVerified(bool $isVerified): void { $this->isVerified = $isVerified; }
    public function setCreatedAt(string $createdAt): void { $this->createdAt = $createdAt; }

    // ------------------------------------------------------------
    // CONVERT ARRAY (SQL row) TO OBJECT
    // ------------------------------------------------------------
    public static function fromArray(array $row): self
    {
        $user = new self();
        $user->setId((int) ($row['id'] ?? 0));
        $user->setFullName((string) ($row['full_name'] ?? ''));
        $user->setEmail((string) ($row['email'] ?? ''));
        $user->setPassword((string) ($row['password'] ?? ''));
        $user->setPhone((string) ($row['phone'] ?? ''));
        $user->setGovernorate((string) ($row['governorate'] ?? ''));
        $user->setRole((string) ($row['role'] ?? 'CLIENT'));
        $user->setIsVerified((bool) ($row['is_verified'] ?? false));
        $user->setCreatedAt((string) ($row['created_at'] ?? ''));
        return $user;
    }
}
