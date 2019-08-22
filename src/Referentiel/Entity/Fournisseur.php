<?php

namespace App\Referentiel\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity(repositoryClass="App\Referentiel\Repository\FournisseurRepository")
 */
class Fournisseur
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
     * @var string
     *
     * @ORM\Column(name="activite", type="string", length=45)
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=45)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule_fisc", type="string", length=45)
     */
    private $matriculeFisc;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=30)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=30)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="code_post", type="integer")
     */
    private $codePost;

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

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMatriculeFisc(): ?string
    {
        return $this->matriculeFisc;
    }

    public function setMatriculeFisc(string $matriculeFisc): self
    {
        $this->matriculeFisc = $matriculeFisc;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePost(): ?int
    {
        return $this->codePost;
    }

    public function setCodePost(int $codePost): self
    {
        $this->codePost = $codePost;

        return $this;
    }

    public function __toString()
    {
    	return $this->getNomPrenom();
    }
}