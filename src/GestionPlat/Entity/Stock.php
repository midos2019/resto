<?php

namespace App\GestionPlat\Entity;

use App\Referentiel\Entity\Categorie;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\StockRepository")
 */
class Stock
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
     * @var double
     *
     * @ORM\Column(name="qte_critique", type="decimal", precision=10, scale=2)
     */
    private $qteCritique;

    /**
     * @ORM\ManyToMany(targetEntity="App\Referentiel\Entity\Categorie")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="LigneStock", mappedBy="stock")
     */
    private $ligneStock;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->ligneStock = new ArrayCollection();
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

    public function getQteCritique()
    {
        return $this->qteCritique;
    }

    public function setQteCritique($qteCritique): self
    {
        $this->qteCritique = $qteCritique;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Collection|LigneStock[]
     */
    public function getLigneStock(): Collection
    {
        return $this->ligneStock;
    }

    public function addLigneStock(LigneStock $ligneStock): self
    {
        if (!$this->ligneStock->contains($ligneStock)) {
            $this->ligneStock[] = $ligneStock;
            $ligneStock->setStock($this);
        }

        return $this;
    }

    public function removeLigneStock(LigneStock $ligneStock): self
    {
        if ($this->ligneStock->contains($ligneStock)) {
            $this->ligneStock->removeElement($ligneStock);
            // set the owning side to null (unless already changed)
            if ($ligneStock->getStock() === $this) {
                $ligneStock->setStock(null);
            }
        }

        return $this;
    }
}