<?php

namespace App\GestionPlat\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="repas_ligne_sortie")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\LigneRepasRepository")
 */
class LigneRepas
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
     * @ORM\ManyToOne(targetEntity="Repas", inversedBy="ligneRepas")
     */
     private $repas;
  
    /**
     * @ORM\ManyToOne(targetEntity="LigneSortie", inversedBy="ligneRepas")
     */
     private $ligneSortie;

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

     public function getRepas(): ?Repas
     {
         return $this->repas;
     }

     public function setRepas(?Repas $repas): self
     {
         $this->repas = $repas;

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
}