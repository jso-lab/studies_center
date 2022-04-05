<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Un compte existe déjà avec cette adresse')]


class Admin 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    private $email;

    #[ORM\Column(type: 'string', length: 60)]
    private $password;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isConnected;

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
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
    public function getIsConnected(): ?bool
    {
        return $this->isConnected;
    }

    public function setIsConnected(?bool $isConnected): self
    {
        $this->isConnected = $isConnected;

        return $this;
    }

}
