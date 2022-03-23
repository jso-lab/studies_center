<?php

namespace App\Entity;

use App\Repository\LearnerRepository;
use App\Entity\Courses;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: LearnerRepository::class)]



class Learner implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    #[ORM\Column(type: 'string', length: 100)]
    
    private $firstName;
    
    #[ORM\Column(type: 'string', length: 100)]
    
    private $lastName;

    #[ORM\Column(type: 'string', length: 200)]
    private $email;
    
    #[ORM\Column(type: 'string', length: 60)]

    private $password;

    
    #[ORM\Column(type: 'blob')]
    private $profilPicture;

    #[ORM\Column(type: 'object')]
    private $Lesson;

    #[ORM\Column(type: 'object')]
    private $courses;

    #[ORM\Column(type: 'array')]
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
     /**
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

   
    public function getCourses(): array
    {
        return $this->courses;
    }

    public function setCourses(array $courses): self
    {
        $this->courses = $courses;

        return $this;
    }

    public function getProfilPicture()
    {
        return $this->profilPicture;
    }

    public function setProfilPicture($profilPicture): self
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    public function getLesson()
    {
        return $this->Lesson;
    }

    public function setLesson($Lesson): self
    {
        $this->Lesson = $Lesson;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getSalt() : ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */

    public function eraseCredentials()
    {
        //to clear any sensitive data
        $this->plainPassword = null;
    }
}
