<?php

namespace App\GestionPlat\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Repas
 *
 * @ORM\Table(name="repas")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\RepasRepository")
 */
class Repas
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
     * @ORM\Column(name="nom", type="string", length=45)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="qte", type="decimal", precision=10, scale=2)
     */
    private $qte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="LigneRepas", mappedBy="repas")
     */
    private $ligneRepas;

    public function __construct()
    {
        $this->ligneRepas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getQte()
    {
        return $this->qte;
    }

    public function setQte($qte): self
    {
        $this->qte = $qte;

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

    /**
     * @return Collection|LigneRepas[]
     */
    public function getLigneRepas(): Collection
    {
        return $this->ligneRepas;
    }

    public function addLigneRepa(LigneRepas $ligneRepa): self
    {
        if (!$this->ligneRepas->contains($ligneRepa)) {
            $this->ligneRepas[] = $ligneRepa;
            $ligneRepa->setRepas($this);
        }

        return $this;
    }

    public function removeLigneRepa(LigneRepas $ligneRepa): self
    {
        if ($this->ligneRepas->contains($ligneRepa)) {
            $this->ligneRepas->removeElement($ligneRepa);
            // set the owning side to null (unless already changed)
            if ($ligneRepa->getRepas() === $this) {
                $ligneRepa->setRepas(null);
            }
        }

        return $this;
    }
}