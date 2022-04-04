<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: StudentRepository::class)]

class Student extends User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    private $email;

    #[ORM\Column(type: 'string', length: 200)]
    private $password;

    #[ORM\Column(type: 'array', nullable: true)]
    private $courses = [];

    #[ORM\Column(type: 'json')]
    private $roles;

    #[ORM\Column(type: 'string', length: 255)]
    private $pseudo;

    public function __construct()
    {
        $this->Lesson = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function setCourses(?array $courses): self
    {
        $this->courses = $courses;

        return $this;
    }
     /**
     * @return Collection<int, Course>
     */
    public function getCourses(): ?array
    {
        return $this->courses;
    }

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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

}
