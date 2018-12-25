<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Books", mappedBy="category")
     */
    private $books;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Affliate", mappedBy="categories")
     */
    private $affliates;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->affliates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return Collection|Books[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Books $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setCategory($this);
        }

        return $this;
    }

    public function removeBook(Books $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getCategory() === $this) {
                $book->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Affliate[]
     */
    public function getAffliates(): Collection
    {
        return $this->affliates;
    }

    public function addAffliate(Affliate $affliate): self
    {
        if (!$this->affliates->contains($affliate)) {
            $this->affliates[] = $affliate;
            $affliate->addCategory($this);
        }

        return $this;
    }

    public function removeAffliate(Affliate $affliate): self
    {
        if ($this->affliates->contains($affliate)) {
            $this->affliates->removeElement($affliate);
            $affliate->removeCategory($this);
        }

        return $this;
    }
}
