<?php

namespace App\Entity;

use App\Repository\CoursesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CoursesRepository::class)]

class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\ManyToOne(targetEntity: Teacher::class, inversedBy: 'Courses')]
    private $teacher;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Illustration::class,  orphanRemoval: true, cascade: ['persist'] )]
    private $illustrations;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Lesson::class)]
    private $section;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Category::class)]
    private $category;

    public function __construct()
    {
       
        $this->illustrations = new ArrayCollection();
        $this->section = new ArrayCollection();
        $this->category = new ArrayCollection();
       
       
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * @return Collection<int, Illustration>
     */
    public function getIllustrations(): Collection
    {
        return $this->illustrations;
    }

    public function addIllustration(Illustration $illustration): self
    {
        if (!$this->illustrations->contains($illustration)) {
            $this->illustrations[] = $illustration;
            $illustration->setCourse($this);
        }

        return $this;
    }

    public function removeIllustration(Illustration $illustration): self
    {
        if ($this->illustrations->removeElement($illustration)) {
            // set the owning side to null (unless already changed)
            if ($illustration->getCourse() === $this) {
                $illustration->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Lesson>
     */
    public function getSection(): Collection
    {
        return $this->section;
    }

    public function addSection(Lesson $section): self
    {
        if (!$this->section->contains($section)) {
            $this->section[] = $section;
            $section->setCourse($this);
        }

        return $this;
    }

    public function removeSection(Lesson $section): self
    {
        if ($this->section->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getCourse() === $this) {
                $section->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
            $category->setCourse($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCourse() === $this) {
                $category->setCourse(null);
            }
        }

        return $this;
    }

   

}
