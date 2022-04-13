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

    #[ORM\Column(type: 'string', nullable: true)]
    private $files;

    #[ORM\ManyToOne(targetEntity: Section::class, inversedBy: 'title')]
    private $section;

    #[ORM\OneToOne(mappedBy: 'lesson', targetEntity: Video::class, cascade: ['persist', 'remove'])]
    private $video;


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

    public function getFiles()
    {
        return $this->files;
    }

    public function setFiles($files): self
    {
        $this->files = $files;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

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



}
