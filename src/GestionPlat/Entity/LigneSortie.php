<?php

namespace App\GestionPlat\Entity;

use App\Referentiel\Entity\Article;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="ligne_sortie")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\LigneSortieRepository")
 */
class LigneSortie
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
     * @ORM\Column(name="qte", type="decimal", precision=10, scale=2)
     */
    private $qte;

    /**
     * @var string
     *
     * @ORM\Column(name="qte_restante", type="decimal", precision=10, scale=2)
     */
    private $qteRestante;

    /**
     * @ORM\ManyToOne(targetEntity="Sortie", inversedBy="ligneSortie")
     */
     private $sortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Référentiel\Entity\Article")
     */
     private $article;

    /**
     * @ORM\OneToMany(targetEntity="LigneSortieStock", mappedBy="ligneSortie")
     */
    private $ligneSortieStock;

    /**
     * @ORM\OneToMany(targetEntity="LigneRepas", mappedBy="ligneSortie")
     */
    private $ligneRepas;

    public function __construct()
    {
        $this->ligneSortieStock = new ArrayCollection();
        $this->ligneRepas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQteRestante()
    {
        return $this->qteRestante;
    }

    public function setQteRestante($qteRestante): self
    {
        $this->qteRestante = $qteRestante;

        return $this;
    }

    public function getSortie(): ?Sortie
    {
        return $this->sortie;
    }

    public function setSortie(?Sortie $sortie): self
    {
        $this->sortie = $sortie;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

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
            $ligneSortieStock->setLigneSortie($this);
        }

        return $this;
    }

    public function removeLigneSortieStock(LigneSortieStock $ligneSortieStock): self
    {
        if ($this->ligneSortieStock->contains($ligneSortieStock)) {
            $this->ligneSortieStock->removeElement($ligneSortieStock);
            // set the owning side to null (unless already changed)
            if ($ligneSortieStock->getLigneSortie() === $this) {
                $ligneSortieStock->setLigneSortie(null);
            }
        }

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
            $ligneRepa->setLigneSortie($this);
        }

        return $this;
    }

    public function removeLigneRepa(LigneRepas $ligneRepa): self
    {
        if ($this->ligneRepas->contains($ligneRepa)) {
            $this->ligneRepas->removeElement($ligneRepa);
            // set the owning side to null (unless already changed)
            if ($ligneRepa->getLigneSortie() === $this) {
                $ligneRepa->setLigneSortie(null);
            }
        }

        return $this;
    }
}
