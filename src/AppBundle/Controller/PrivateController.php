<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrivateController extends Controller
{
    /**
     * @Route("/nuevoTrayecto", name="private_nuevoTrayecto")
     */
    public function nuevoTrayectoAction(Request $request)
    {
    
    /**
     * 1.- Crear carpeta nueva /app/Resources/views/trayecto
     * 2.- Del proyecto de la semana pasada, copiar a este el fichero nuevoTrayecto.html.twig
     * 3.- Modificar el fichero todas las acciones que haga falta
     *  
     * 
     * */
    return $this->render('building/index.html.twig');
    }
        
        
        
     /**
     * @Route("/publicarTrayecto", name="private_publicarTrayecto")
     */
     
    public function publicarTrayectoAction(Request $request)
    {
    
    /**
     * 1.- Crear carpeta nueva /app/Resources/views/trayecto
     * 2.- Del proyecto de la semana pasada, copiar el contenido a este el fichero publicarTrayecto.php
     * 3.- Modificar el fichero todas las acciones que haga falta
     *  
     * 
     * */
    return $this->render('building/index.html.twig');
    }
}


