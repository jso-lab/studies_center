<?php

namespace App\Entity;

use App\Repository\LessonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
class Lesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'blob')]
    private $video;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'array', nullable: true)]
    private $ressources = [];

    #[ORM\ManyToOne(targetEntity: Teacher::class, inversedBy: 'Lesson')]
    private $courses;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRessources(): ?array
    {
        return $this->ressources;
    }

    public function setRessources(?array $ressources): self
    {
        $this->ressources = $ressources;

        return $this;
    }

    public function getCourses(): ?Teacher
    {
        return $this->courses;
    }

    public function setCourses(?Teacher $courses): self
    {
        $this->courses = $courses;

        return $this;
    }
}
