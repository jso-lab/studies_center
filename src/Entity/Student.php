<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Un compte avec cette adresse existe déjà...')]

class Student extends User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Email(message : "Ceci '{{ value }}' n\'est pas valide.")]
    private $email;

    #[ORM\Column(type: 'string', length: 200)]
    #[Assert\Length(
        min : "8",
        message : "Le mot de passe doit contenir au minimum {{ limit }} caractères.")]
    private $password;

    #[Assert\EqualTo(
        propertyPath:"password",
        message : "Les mots de passe sont différents...")]
    public $confirm_plainPassword;

    #[ORM\Column(type: 'array', nullable: true)]
    private $courses = [];

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
        return  $this->email;
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
        
        return array('ROLE_USER');

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
