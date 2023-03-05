<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagen = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $ciudad = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $provincia = null;

    #[ORM\Column]
    private ?float $precio = null;

    #[ORM\Column]
    private ?float $valoracion = null;

    #[ORM\ManyToMany(targetEntity: Ventajas::class, inversedBy: 'hoteles')]
    private Collection $ventajas;

    public function __construct()
    {
        $this->ventajas = new ArrayCollection();
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

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(?string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getValoracion(): ?float
    {
        return $this->valoracion;
    }

    public function setValoracion(float $valoracion): self
    {
        $this->valoracion = $valoracion;

        return $this;
    }

    /**
     * @return Collection<int, Ventajas>
     */
    public function getVentajas(): Collection
    {
        return $this->ventajas;
    }

    public function addVentaja(Ventajas $ventaja): self
    {
        if (!$this->ventajas->contains($ventaja)) {
            $this->ventajas->add($ventaja);
        }

        return $this;
    }

    public function removeVentaja(Ventajas $ventaja): self
    {
        $this->ventajas->removeElement($ventaja);

        return $this;
    }
}
