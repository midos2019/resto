<?php

namespace App\Referentiel\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass="App\Referentiel\Repository\EtablissementRepository")
 */
class Etablissement
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
     * @ORM\Column(name="nom_ministere", type="string", length=45)
     */
    private $nomMinistere;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_dir", type="string", length=45)
     */
    private $nomDir;

    /**
     * @var string
     *
     * @ORM\Column(name="magasinier", type="string", length=45)
     */
    private $magasinier;

    /**
     * @var string
     *
     * @ORM\Column(name="econome", type="string", length=45)
     */
    private $econome;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45)
     */
    private $ville;

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
     * @ORM\Column(name="annee_scol", type="string", length=10)
     */
    private $anneeScol;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=45)
     */
    private $adresse;

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

    public function getNomMinistere(): ?string
    {
        return $this->nomMinistere;
    }

    public function setNomMinistere(string $nomMinistere): self
    {
        $this->nomMinistere = $nomMinistere;

        return $this;
    }

    public function getNomDir(): ?string
    {
        return $this->nomDir;
    }

    public function setNomDir(string $nomDir): self
    {
        $this->nomDir = $nomDir;

        return $this;
    }

    public function getMagasinier(): ?string
    {
        return $this->magasinier;
    }

    public function setMagasinier(string $magasinier): self
    {
        $this->magasinier = $magasinier;

        return $this;
    }

    public function getEconome(): ?string
    {
        return $this->econome;
    }

    public function setEconome(string $econome): self
    {
        $this->econome = $econome;

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

    public function getAnneeScol(): ?string
    {
        return $this->anneeScol;
    }

    public function setAnneeScol(string $anneeScol): self
    {
        $this->anneeScol = $anneeScol;

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
}