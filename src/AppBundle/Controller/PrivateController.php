<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trayecto;
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
        $nuevoTrayecto = new Trayecto();
        
        $nuevoTrayecto->setOrigen(($request->get('origen')));
        $nuevoTrayecto->setDestino($request->get('destino'));
        $nuevoTrayecto->setCalle($request->get('calle'));
        $fechaDateTime = new \DateTime($request->get('fechaDeViaje'));
        $nuevoTrayecto->setFechaDeViaje($fechaDateTime);
        $horaDateTime = new \DateTime($request->get('horaDeViaje'));
        $nuevoTrayecto->setHoraDeViaje($horaDateTime);
        $nuevoTrayecto->setPrecio($request->get('precio'));
        $nuevoTrayecto->setDescripcion($request->get('descripcion'));
        $nuevoTrayecto->setPlazas($request->get('plazas'));
        $usuarioLogueado = $this->getUser();
        $nuevoTrayecto->setConductor($usuarioLogueado);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($nuevoTrayecto);
        $entityManager->flush();
        
        die("Pendiente de hacer");
        
    /**
     * TODO:
     *  Dejamos pendiente la redirección a la pantalla list, que la haremos cuando completemos dicha pantalla.
     *  Por ahora redireccionamos a public_home
     */
 
     return $this->redirect($this->generateUrl('public_home'));
    // return $this->render('building/index.html.twig');
    //return $this->render('publicarTrayecto/publicarTrayecto.html.twig');
    }
}


