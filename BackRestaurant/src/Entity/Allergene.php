<?php

namespace App\Entity;

use App\Repository\AllergeneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AllergeneRepository::class)]
class Allergene
{
    #[ORM\Id]
    #[Groups(['prod'])]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    #[Groups(['prod'])]
    private ?string $nom = null;


    /**
     * @var Collection<int, boisson>
     */
    #[ORM\ManyToMany(targetEntity: boisson::class, inversedBy: 'allergenes')]
    private Collection $boisson;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\ManyToMany(targetEntity: Produit::class, mappedBy: 'ProduitAllergene')]
    private Collection $produits;

    public function __construct()
    {

        $this->boisson = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }







    /**
     * @return Collection<int, boisson>
     */
    public function getBoisson(): Collection
    {
        return $this->boisson;
    }

    public function addBoisson(boisson $boisson): static
    {
        if (!$this->boisson->contains($boisson)) {
            $this->boisson->add($boisson);
        }

        return $this;
    }

    public function removeBoisson(boisson $boisson): static
    {
        $this->boisson->removeElement($boisson);

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->addProduitAllergene($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeProduitAllergene($this);
        }

        return $this;
    }
}
