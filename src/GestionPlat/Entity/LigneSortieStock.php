<?php

namespace App\GestionPlat\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="ligne_sortie__ligne_stock")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\LigneSortieStockRepository")
 */
class LigneSortieStock
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
     * @ORM\Column(name="qte", type="decimal", precision=15, scale=3)
     */
    private $qte;

    /**
     * @ORM\ManyToOne(targetEntity="LigneSortie", inversedBy="ligneSortieStock")
     */
     private $ligneSortie;
  
    /**
     * @ORM\ManyToOne(targetEntity="LigneStock", inversedBy="ligneSortieStock")
     */
     private $ligneStock;

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

     public function getLigneSortie(): ?LigneSortie
     {
         return $this->ligneSortie;
     }

     public function setLigneSortie(?LigneSortie $ligneSortie): self
     {
         $this->ligneSortie = $ligneSortie;

         return $this;
     }

     public function getLigneStock(): ?LigneStock
     {
         return $this->ligneStock;
     }

     public function setLigneStock(?LigneStock $ligneStock): self
     {
         $this->ligneStock = $ligneStock;

         return $this;
     }
}
