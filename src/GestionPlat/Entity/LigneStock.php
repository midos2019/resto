<?php

namespace App\GestionPlat\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="ligne_stock")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\LigneStockRepository")
 */
class LigneStock
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
     * @ORM\Column(name="qte_initial", type="decimal", precision=10, scale=2)
     */
    private $qteInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="qte_restante", type="decimal", precision=10, scale=2)
     */
    private $qteRestante;

    /**
     * @var string
     *
     * @ORM\Column(name="qte_invalide", type="decimal", precision=10, scale=2)
     */
    private $qteInvalide;

    /**
     * @ORM\ManyToOne(targetEntity="LigneAchat")
     */
     private $ligneAchat;

    /**
     * @ORM\ManyToOne(targetEntity="Stock", inversedBy="ligneStock")
     */
     private $stock;

    /**
     * @ORM\OneToMany(targetEntity="LigneSortieStock", mappedBy="ligneStock")
     */
    private $ligneSortieStock;

    public function __construct()
    {
        $this->ligneSortieStock = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteInitial()
    {
        return $this->qteInitial;
    }

    public function setQteInitial($qteInitial): self
    {
        $this->qteInitial = $qteInitial;

        return $this;
    }

    public function getQteRestante()
    {
        return $this->qteRestante;
    }

    public function setQteRestante($qteRestante): self
    {
        $this->qteRestante = $qteRestante;

        return $this;
    }

    public function getQteInvalide()
    {
        return $this->qteInvalide;
    }

    public function setQteInvalide($qteInvalide): self
    {
        $this->qteInvalide = $qteInvalide;

        return $this;
    }

    public function getLigneAchat(): ?LigneAchat
    {
        return $this->ligneAchat;
    }

    public function setLigneAchat(?LigneAchat $ligneAchat): self
    {
        $this->ligneAchat = $ligneAchat;

        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return Collection|LigneSortieStock[]
     */
    public function getLigneSortieStock(): Collection
    {
        return $this->ligneSortieStock;
    }

    public function addLigneSortieStock(LigneSortieStock $ligneSortieStock): self
    {
        if (!$this->ligneSortieStock->contains($ligneSortieStock)) {
            $this->ligneSortieStock[] = $ligneSortieStock;
            $ligneSortieStock->setLigneStock($this);
        }

        return $this;
    }

    public function removeLigneSortieStock(LigneSortieStock $ligneSortieStock): self
    {
        if ($this->ligneSortieStock->contains($ligneSortieStock)) {
            $this->ligneSortieStock->removeElement($ligneSortieStock);
            // set the owning side to null (unless already changed)
            if ($ligneSortieStock->getLigneStock() === $this) {
                $ligneSortieStock->setLigneStock(null);
            }
        }

        return $this;
    }
}
