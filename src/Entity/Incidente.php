<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IncidenteRepository")
 */
class Incidente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Camara", inversedBy="incidentes")
     */
    private $camaras;

    public function __construct()
    {
        $this->camaras = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Camara[]
     */
    public function getCamaras(): Collection
    {
        return $this->camaras;
    }

    public function addCamara(Camara $camara): self
    {
        if (!$this->camaras->contains($camara)) {
            $this->camaras[] = $camara;
        }

        return $this;
    }

    public function removeCamara(Camara $camara): self
    {
        if ($this->camaras->contains($camara)) {
            $this->camaras->removeElement($camara);
        }

        return $this;
    }
}
