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

    #[ORM\Column(type: 'array', nullable: true)]
    private $courses = [];

    public function __construct()
    {
        $this->Lesson = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

}
