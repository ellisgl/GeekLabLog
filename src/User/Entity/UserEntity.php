<?php
namespace App\User\Entity;

use \DateTimeImmutable;
use \DateTimeZone;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class UserEntity implements UserInterface
{
    /** @var string|null $id */
    private $id;

    /** @var string $userName */
    private $userName;

    /** @var string $email */
    private $email;

    /** @var string $password */
    private $password;

    /** @var array $roles */
    private $roles = [];

    /** @var DateTimeImmutable $created */
    private $created;

    /** @var DateTimeImmutable|null $lastEdited */
    private $lastEdited;

    /** @var DateTimeImmutable|null $deleted */
    private $deleted;

    public function __construct()
    {
        // Make sure we have at least have the ROLE_USER as a role for the user.
        $this->roles[] = 'ROLE_USER';

        // Make 100% certain we are dealing with an UTC timezone DateTimeImmutable object.
        $this->created = DateTimeImmutable::createFromFormat('U', time(), new DateTimeZone('UTC'));
    }

    /**
     * Validation stuffs.
     *
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraints('userName', [new NotBlank()]);
        $metadata->addPropertyConstraints('email', [new NotBlank(), new Email()]);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     *
     * @return $this
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        // Make sure we only come back with the uniques.
        return array_unique($this->roles);
    }

    /**
     * Add a role.
     *
     * @param string $role
     *
     * @return $this
     */
    public function addRole(string $role): self
    {
        // Make it conform.
        $role = strtoupper($role);

        // Make sure we don't litter the roles array.
        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * Set / Overrider the roles.
     *
     * @param array $roles
     *
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = ['ROLE_USER'];

        // Loop through.
        foreach($roles as $role) {
            $role = strtoupper($role);

            // Make sure we don't get doubles.
            if (!in_array($role, $this->roles, true)) {
                $this->roles[] = $role;
            }
        }

        return $this;
    }

    /**
     * @see UserInterface
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt(): void
    {
        // Not needed when using the "bcrypt" algorithm in security.yaml.
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreated(): DateTimeImmutable
    {
        return $this->created;
    }

    /**
     * @param DateTimeImmutable $created
     *
     * @return $this
     */
    public function setCreated(DateTimeImmutable $created): self
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getLastEdited(): ?DateTimeImmutable
    {
        return $this->lastEdited;
    }

    /**
     * @param DateTimeImmutable|null $lastEdited
     *
     * @return $this
     */
    public function setLastEdited(?DateTimeImmutable $lastEdited): self
    {
        $this->lastEdited = $lastEdited;
        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDeleted(): ?DateTimeImmutable
    {
        return $this->deleted;
    }

    /**
     * @param DateTimeImmutable|null $deleted
     *
     * @return $this
     */
    public function setDeleted(?DateTimeImmutable $deleted): self
    {
        $this->deleted = $deleted;
        return $this;
    }
}
