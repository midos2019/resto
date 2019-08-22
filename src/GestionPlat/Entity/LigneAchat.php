<?php

namespace App\GestionPlat\Entity;

use App\Referentiel\Entity\Article;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="ligne_achat")
 * @ORM\Entity(repositoryClass="App\GestionPlat\Repository\LigneAchatRepository")
 */
class LigneAchat
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
     * @var double
     *
     * @ORM\Column(name="qte", type="decimal", precision=15, scale=3)
     */
    private $qte;

    /**
     * @var double
     *
     * @ORM\Column(name="prix_unit", type="decimal", precision=15, scale=3)
     */
    private $prixUnit;

    /**
     * @ORM\ManyToOne(targetEntity="Achat", inversedBy="ligneAchat")
     */
     private $achat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Referentiel\Entity\Article")
     */
     private $article;

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

     public function getPrixUnit()
     {
         return $this->prixUnit;
     }

     public function setPrixUnit($prixUnit): self
     {
         $this->prixUnit = $prixUnit;

         return $this;
     }

     public function getAchat(): ?Achat
     {
         return $this->achat;
     }

     public function setAchat(?Achat $achat): self
     {
         $this->achat = $achat;

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
}

