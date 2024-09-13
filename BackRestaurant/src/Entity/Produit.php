<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['prod'])]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    #[Groups(['prod'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['prod'])]
    private ?string $composition = null;

    #[ORM\Column(type: 'float')]
    #[Groups(['prod'])]
    private ?float $prix = null;

    #[ORM\Column]
    #[Groups(['prod'])]
    private ?bool $disponible = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['prod'])]
    private ?CategorieProduit $categorie = null;

    /**
     * @var Collection<int, Menu>
     */
    #[ORM\ManyToMany(targetEntity: Menu::class, mappedBy: 'menuProduit')]
    private Collection $menus;

    /**
     * @var Collection<int, Allergene>
     */
    #[ORM\ManyToMany(targetEntity: Allergene::class, inversedBy: 'produits')]
    private Collection $allergenes; // Correction du nom de la propriété

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->allergenes = new ArrayCollection(); // Correction du nom de la propriété
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

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(string $composition): static
    {
        $this->composition = $composition;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;
        return $this;
    }

    public function isDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): static
    {
        $this->disponible = $disponible;
        return $this;
    }

    public function getCategorie(): ?CategorieProduit
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieProduit $categorie): static
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): static
    {
        if (!$this->menus->contains($menu)) {
            $this->menus->add($menu);
            $menu->addMenuProduit($this);
        }
        return $this;
    }

    public function removeMenu(Menu $menu): static
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removeMenuProduit($this);
        }
        return $this;
    }

    /**
     * @return Collection<int, Allergene>
     */
    public function getAllergenes(): Collection
    {
        return $this->allergenes; // Correction du nom de la méthode
    }

    public function addAllergene(Allergene $allergene): static
    {
        if (!$this->allergenes->contains($allergene)) {
            $this->allergenes->add($allergene);
        }
        return $this;
    }

    public function removeAllergene(Allergene $allergene): static
    {
        $this->allergenes->removeElement($allergene);
        return $this;
    }
}
