<?php

namespace App\Referentiel\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnel
 *
 * @ORM\Table(name="personnel")
 * @ORM\Entity(repositoryClass="App\Referentiel\Repository\PersonnelRepository")
 */
class Personnel
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
     * @ORM\Column(name="nom_prenom", type="string", length=45)
     */
    private $nomPrenom;

    /**
     * @ORM\ManyToOne(targetEntity="Fonction")
     */
     private $fonction;

     public function getId(): ?int
     {
         return $this->id;
     }

     public function getNomPrenom(): ?string
     {
         return $this->nomPrenom;
     }

     public function setNomPrenom(string $nomPrenom): self
     {
         $this->nomPrenom = $nomPrenom;

         return $this;
     }

     public function getFonction(): ?Fonction
     {
         return $this->fonction;
     }

     public function setFonction(?Fonction $fonction): self
     {
         $this->fonction = $fonction;

         return $this;
     }

     public function __toString()
     {
     	return $this->getNomPrenom();
     }
}