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
     * @var Collection<int, produit>
     */
    #[ORM\ManyToMany(targetEntity: Produit::class, inversedBy: 'allergenes')]
    private Collection $produitAllergene;
    /**
     * @var Collection<int, boisson>
     */
    #[ORM\ManyToMany(targetEntity: boisson::class, inversedBy: 'allergenes')]
    private Collection $boisson;

    public function __construct()
    {
        $this->produitAllergene = new ArrayCollection();
        $this->boisson = new ArrayCollection();
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
     * @return Collection<int, produit>
     */
    public function getProduitAllergene(): Collection
    {
        return $this->produitAllergene;
    }

    public function addProduitAllergene(produit $produitAllergene): static
    {
        if (!$this->produitAllergene->contains($produitAllergene)) {
            $this->produitAllergene->add($produitAllergene);
        }

        return $this;
    }

    public function removeProduitAllergene(produit $produitAllergene): static
    {
        $this->produitAllergene->removeElement($produitAllergene);

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
}
