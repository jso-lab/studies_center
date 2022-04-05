<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: Lesson::class)]
    private $title;

    public function __construct()
    {
        $this->title = new ArrayCollection();
    }


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

    /**
     * @return Collection<int, Lesson>
     */
    public function getTitle(): Collection
    {
        return $this->title;
    }

    public function addTitle(Lesson $title): self
    {
        if (!$this->title->contains($title)) {
            $this->title[] = $title;
            $title->setSection($this);
        }

        return $this;
    }

    public function removeTitle(Lesson $title): self
    {
        if ($this->title->removeElement($title)) {
            // set the owning side to null (unless already changed)
            if ($title->getSection() === $this) {
                $title->setSection(null);
            }
        }

        return $this;
    }

}
