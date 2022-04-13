<?php

namespace App\Entity;

use App\Repository\LessonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
class Lesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;


    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\OneToOne(mappedBy: 'lesson', targetEntity: Video::class, cascade: ['persist', 'remove'])]
    private $video;

    #[ORM\OneToOne(mappedBy: 'lesson', targetEntity: Category::class, cascade: ['persist', 'remove'])]
    private $category;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'section')]
    private $course;


    public function __construct()
    {
        $this->sections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): self
    {
        // unset the owning side of the relation if necessary
        if ($video === null && $this->video !== null) {
            $this->video->setLesson(null);
        }

        // set the owning side of the relation if necessary
        if ($video !== null && $video->getLesson() !== $this) {
            $video->setLesson($this);
        }

        $this->video = $video;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        // unset the owning side of the relation if necessary
        if ($category === null && $this->category !== null) {
            $this->category->setLesson(null);
        }

        // set the owning side of the relation if necessary
        if ($category !== null && $category->getLesson() !== $this) {
            $category->setLesson($this);
        }

        $this->category = $category;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }



}
