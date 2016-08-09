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
    private function nuevoTrayectoAction(Request $request)
    {
    
    /**
     * 1.- Crear carpeta nueva /app/Resources/views/trayecto
     * 2.- Del proyecto de la semana pasada, copiar a este el fichero nuevoTrayecto.html.twig
     * 3.- Modificar el fichero todas las acciones que haga falta
     *  
     * 
     * */
    
    
    
    
    
    
    die("pendiente por hacer: Nuevo Trayecto");
        }
        
        
        
     /**
     * @Route("/publicarTrayecto", name="private_publicarTrayecto")
     */
     
    private function publicarTrayectoAction(Request $request)
    {
    
    /**
     * 1.- Crear carpeta nueva /app/Resources/views/trayecto
     * 2.- Del proyecto de la semana pasada, copiar el contenido a este el fichero publicarTrayecto.php
     * 3.- Modificar el fichero todas las acciones que haga falta
     *  
     * 
     * */
    
    
    
    
    
    
    die("pendiente por hacer: Publicar nuevo trayecto");
    }
}


