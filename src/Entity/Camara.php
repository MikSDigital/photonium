<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CamaraRepository")
 */
class Camara
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Incidente", mappedBy="camaras")
     */
    private $incidentes;

    public function __construct()
    {
        $this->incidentes = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Incidente[]
     */
    public function getIncidentes(): Collection
    {
        return $this->incidentes;
    }

    public function addIncidente(Incidente $incidente): self
    {
        if (!$this->incidentes->contains($incidente)) {
            $this->incidentes[] = $incidente;
            $incidente->addCamara($this);
        }

        return $this;
    }

    public function removeIncidente(Incidente $incidente): self
    {
        if ($this->incidentes->contains($incidente)) {
            $this->incidentes->removeElement($incidente);
            $incidente->removeCamara($this);
        }

        return $this;
    }
}
