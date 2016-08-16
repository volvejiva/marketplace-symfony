<?php
// src/AppBundle/Entity/Persona.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Persona extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
    * @ORM\Column(type="string", nullable=true)
    */
    protected $avatar;
    
    /**
     * @ORM\OneToMany(targetEntity="Trayecto", mappedBy="conductor")
     */
    protected $trayectos;

    public function __construct()
    {
        parent::__construct();
        // your own logic

        $avatars=array(
            "https://addons.cdn.mozilla.net/user-media/userpics/0/0/45.png?modified=1447324257",
            "http://megaforo.com/images/user4.png",
            "http://gh.nsrrc.org.tw/Content/img/male05.png"
        );
        //numero aleatorio para elegir el avatar
        $indexSel = rand(0, count($avatars) - 1);
        //Asignacion del avatar aleatorio
        $this->avatar = $avatars[$indexSel];
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Persona
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add trayectos
     *
     * @param \AppBundle\Entity\Trayecto $trayectos
     * @return Persona
     */
    public function addTrayecto(\AppBundle\Entity\Trayecto $trayectos)
    {
        $this->trayectos[] = $trayectos;

        return $this;
    }

    /**
     * Remove trayectos
     *
     * @param \AppBundle\Entity\Trayecto $trayectos
     */
    public function removeTrayecto(\AppBundle\Entity\Trayecto $trayectos)
    {
        $this->trayectos->removeElement($trayectos);
    }

    /**
     * Get trayectos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrayectos()
    {
        return $this->trayectos;
    }
}
