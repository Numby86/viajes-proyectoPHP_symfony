<?php

namespace App\Entity;

use App\Repository\VentajasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentajasRepository::class)]
class Ventajas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\ManyToMany(targetEntity: Hotel::class, mappedBy: 'ventajas')]
    private Collection $hoteles;

    public function __construct()
    {
        $this->hoteles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Hotel>
     */
    public function getHoteles(): Collection
    {
        return $this->hoteles;
    }

    public function addHotele(Hotel $hotele): self
    {
        if (!$this->hoteles->contains($hotele)) {
            $this->hoteles->add($hotele);
            $hotele->addVentaja($this);
        }

        return $this;
    }

    public function removeHotele(Hotel $hotele): self
    {
        if ($this->hoteles->removeElement($hotele)) {
            $hotele->removeVentaja($this);
        }

        return $this;
    }
}
