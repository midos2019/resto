<?php

namespace App\GestionPlat\Entity;

use App\Referentiel\Entity\Fournisseur;
use App\Referentiel\Entity\Personnel;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AchatController
 *
 * @ORM\Table(name="achat")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\AchatRepository")
 */
class Achat
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Referentiel\Entity\Fournisseur")
     */
     private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Referentiel\Entity\Personnel")
     */
     private $personnel;

    /**
     * @ORM\OneToMany(targetEntity="LigneAchat", mappedBy="achat")
     */
    private $ligneAchat;

    public function __construct()
    {
        $this->ligneAchat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

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
     * @return Collection|LigneAchat[]
     */
    public function getLigneAchat(): Collection
    {
        return $this->ligneAchat;
    }

    public function addLigneAchat(LigneAchat $ligneAchat): self
    {
        if (!$this->ligneAchat->contains($ligneAchat)) {
            $this->ligneAchat[] = $ligneAchat;
            $ligneAchat->setAchat($this);
        }

        return $this;
    }

    public function removeLigneAchat(LigneAchat $ligneAchat): self
    {
        if ($this->ligneAchat->contains($ligneAchat)) {
            $this->ligneAchat->removeElement($ligneAchat);
            // set the owning side to null (unless already changed)
            if ($ligneAchat->getAchat() === $this) {
                $ligneAchat->setAchat(null);
            }
        }

        return $this;
    }
}


