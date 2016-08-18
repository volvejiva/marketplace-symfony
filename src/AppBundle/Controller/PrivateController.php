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
     * muestra un formulario para crear un nuevp trayecto
     * 
     * 1.- Crear carpeta nueva /app/Resources/views/trayecto
     * 1. Habría que copiar los twig de nuevoTrayecto.html.twig
     * 2. Y indicar en el render que se muestren
     *  
     * 
     * */
    return $this->render('nuevoTrayecto/index.html.twig');
    //return $this->render('nuevoTrayecto/nuevoTrayecto.html.twig');
    }
        
        
        
     /**
     * @Route("/publicarTrayecto", name="private_publicarTrayecto")
     */
     
    public function publicarTrayectoAction(Request $request)
    {
    
    /**
     * Guarda los datos enviados por el formulario nuevoTrayecto
     * 
     * 1. Habría que guardar los datos recibiendos en $_GET en un nuevoTrayecto
     * 1.- Crear carpeta nueva /app/Resources/views/trayecto
     * 
     * */
    return $this->render('building/index.html.twig');
    //return $this->render('publicarTrayecto/publicarTrayecto.html.twig');
    }
}


