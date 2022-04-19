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

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'section')]
    #[ORM\JoinColumn(nullable: true)]
    private $course;

    #[ORM\OneToMany(mappedBy: 'lesson', targetEntity: File::class)]
    private $files;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    public function __construct()
    {
        $this->files = new ArrayCollection();
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

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setLesson($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getLesson() === $this) {
                $file->setLesson(null);
            }
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

}
