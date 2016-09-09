<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Persona;
use AppBundle\Entity\Trayecto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PublicController extends Controller
{
    /**
    * @Route("/", name="home")
    */
    public function homeAction(Request $request)
    {
        // Instanciamos la clase EntityManager de Doctrine
        $entityManager = $this->getDoctrine()->getManager();
        // Obtenemos el número de Ciudades disponibles:
        $repositorioCiudad = $entityManager->getRepository("AppBundle:Ciudad");
        $ciudades = $repositorioCiudad->findAll();
        // Obtenemos el número de Trayectos creados:
        $repositorioTrayecto = $entityManager->getRepository("AppBundle:Trayecto");
        $trayectos = $repositorioTrayecto->findAll();
        // Obtenemos el número de Conductores de nuestra plataforma
        $repositorioPersona = $entityManager->getRepository("AppBundle:Persona");
        $personas = $repositorioPersona->findAll();
        
        return $this->render('home/index.html.twig', array(
            'ciudades' => $ciudades,
            'trayectos' => $trayectos,
            'personas' => $personas
            ));
    }
    
    /**
    * @Route("/list", name="list")
    */
    public function listAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repositorioTrayecto = $entityManager->getRepository("AppBundle:Trayecto");
        
        // Inicializamos la consulta, QueryBuilder
        $queryBuilder = $repositorioTrayecto->createQueryBuilder('trayecto');
        // Aplicamos un primer filtro para los trayectos que estén habilitados
        $queryBuilder->where('trayecto.enabled = true');
        
        // Si se especifica una Ciudad, se aplica dicho filtro
        if($request->get('country') != "") {
            $queryBuilder->andWhere('trayecto.origen = :country')
            ->orWhere('trayecto.destino = :country');
            $queryBuilder->setParameter('country', $request->get('country'));
        }   
        if($request->get('posted') != ""&& $request->get('posted') != "0"){
            // Se buscan los viajes que estén previstos antes de la fecha indicada en el filtro
            $queryBuilder->andWhere('trayecto.fechaDeViaje < :fechaDeViaje');
            // Se calcula la fecha, con la actual + X días (según el parámetro indicado)
            $date=new \DateTime();
            $date->modify('+' . $request->get('posted').' day');
            $queryBuilder->setParameter('fechaDeViaje', $date);
        }
        $trayectosFiltrados = $queryBuilder->getQuery()->execute();
        
        $repositorioCiudad = $entityManager->getRepository("AppBundle:Ciudad");
        $ciudades = $repositorioCiudad->findAll();

         return $this->render('list/index.html.twig', array(
            'trayectos' => $trayectosFiltrados,
            'ciudades' => $ciudades,
            'country' => $request->get('country'),
            'posted' => $request->get('posted'),
            'trayectos' => $trayectosFiltrados
        ));
    }
    
    /**
     * @Route("/terminos", name="public_terminos")
     */
    public function terminosAction() {
        return $this->render('terminos/index.html.twig');
    }
    
    /**
     * @Route("/fichaUsuario/{persona}", name="public_fichaUsuario")
     * @ParamConverter("persona", class="AppBundle:Persona")
     */
    public function fichaUsuarioAction(Persona $persona) {
        /* Usando el ParamConverter nos ahorramos este código
        $entityManager = $this->getDoctrine()->getManager();
        $repositorioPersona = $entityManager->getRepository("AppBundle:Persona");
        $persona = $repositorioPersona->findOneById($idUsuario);
        */

         return $this->render('fichas/fichaUsuario.html.twig', array(
            'persona' => $persona
        ));
    }
    
    /**
     * @Route("/fichaTrayecto/{trayecto}", name="public_fichaTrayecto")
     * @ParamConverter("trayecto", class="AppBundle:Trayecto")
     */
    public function fichaTrayectoAction(Trayecto $trayecto) {
        /* Usando el ParamConverter nos ahorramos este código
        $entityManager = $this->getDoctrine()->getManager();
        $repositorioTrayecto = $entityManager->getRepository("AppBundle:Trayecto");
        trayecto = $repositorioTrayecto->findOneById($idTrayecto);
        */

         return $this->render('fichas/fichaTrayecto.html.twig', array(
            'trayecto' => $trayecto
        ));
    }
    
}