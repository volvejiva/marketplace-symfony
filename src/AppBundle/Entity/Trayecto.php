<?php
// src/AppBundle/Entity/Trayecto.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORm\Entity
 * @ORM\Table(name="trayecto")
*/
class Trayecto {
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $origen;
    /**
     * @ORM\Column(type="string")
     */
    protected $destino;
    /**
     * @ORM\Column(type="string")
     */
    protected $calle;
    /**
     * @ORM\Column(type="date")
     */
    protected $fechaPublicacion;
    /**
     * @ORM\Column(type="time")
     */
    protected $hora;
    /**
     * @ORM\Column(type="float")
     */
    protected $precio;
    /**
     * @ORM\Column(type="text")
     */
    protected $descripcion;
    /**
     * @ORM\Column(type="integer")
     */
    protected $plazas;
    
    /**
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="trayectos")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    protected $conductor;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set origen
     *
     * @param string $origen
     * @return Trayecto
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return string 
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return Trayecto
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Trayecto
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return Trayecto
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    /**
     * Get fechaPublicacion
     *
     * @return \DateTime 
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Trayecto
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Trayecto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Trayecto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set plazas
     *
     * @param integer $plazas
     * @return Trayecto
     */
    public function setPlazas($plazas)
    {
        $this->plazas = $plazas;

        return $this;
    }

    /**
     * Get plazas
     *
     * @return integer 
     */
    public function getPlazas()
    {
        return $this->plazas;
    }

    /**
     * Set conductor
     *
     * @param \AppBundle\Entity\Persona $conductor
     * @return Trayecto
     */
    public function setConductor(\AppBundle\Entity\Persona $conductor = null)
    {
        $this->conductor = $conductor;

        return $this;
    }

    /**
     * Get conductor
     *
     * @return \AppBundle\Entity\Persona 
     */
    public function getConductor()
    {
        return $this->conductor;
    }
}
