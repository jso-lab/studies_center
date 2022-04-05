<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'sections')]
    private $lessons;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLessons(): ?Course
    {
        return $this->lessons;
    }

    public function setLessons(?Course $lessons): self
    {
        $this->lessons = $lessons;

        return $this;
    }

}
