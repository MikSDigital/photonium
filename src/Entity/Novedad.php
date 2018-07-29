<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NovedadRepository")
 */
class Novedad
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Control", inversedBy="novedades")
     * @ORM\JoinColumn(nullable=false)
     */
    private $control;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Camara", inversedBy="novedades")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camara;

    public function getId()
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getControl(): ?Control
    {
        return $this->control;
    }

    public function setControl(?Control $control): self
    {
        $this->control = $control;

        return $this;
    }

    public function getCamara(): ?Camara
    {
        return $this->camara;
    }

    public function setCamara(?Camara $camara): self
    {
        $this->camara = $camara;

        return $this;
    }
}
