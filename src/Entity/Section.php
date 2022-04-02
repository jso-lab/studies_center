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

    #[ORM\ManyToOne(targetEntity: Course::class)]
    private $title;

    #[ORM\ManyToOne(targetEntity: Lesson::class)]
    private $lessons;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?Course
    {
        return $this->title;
    }

    public function setTitle(?Course $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLessons(): ?Lesson
    {
        return $this->lessons;
    }

    public function setLessons(?Lesson $lessons): self
    {
        $this->lessons = $lessons;

        return $this;
    }
}
