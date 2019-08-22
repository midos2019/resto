<?php

namespace App\GestionPlat\Entity;

use App\Referentiel\Entity\Personnel;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SortieController
 *
 * @ORM\Table(name="sortie")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\SortieRepository")
 */
class Sortie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=45)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Référentiel\Entity\Personnel", inversedBy="SortieController")
     */
     private $personnel;

    /**
     * @ORM\OneToMany(targetEntity="LigneSortie", mappedBy="sortie")
     */
    private $ligneSortie;

    public function __construct()
    {
        $this->ligneSortie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }

    /**
     * @return Collection|LigneSortie[]
     */
    public function getLigneSortie(): Collection
    {
        return $this->ligneSortie;
    }

    public function addLigneSortie(LigneSortie $ligneSortie): self
    {
        if (!$this->ligneSortie->contains($ligneSortie)) {
            $this->ligneSortie[] = $ligneSortie;
            $ligneSortie->setSortie($this);
        }

        return $this;
    }

    public function removeLigneSortie(LigneSortie $ligneSortie): self
    {
        if ($this->ligneSortie->contains($ligneSortie)) {
            $this->ligneSortie->removeElement($ligneSortie);
            // set the owning side to null (unless already changed)
            if ($ligneSortie->getSortie() === $this) {
                $ligneSortie->setSortie(null);
            }
        }

        return $this;
    }
}