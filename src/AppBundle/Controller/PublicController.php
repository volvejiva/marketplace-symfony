<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('home/index.html.twig');
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
        
        return $this->render('list/index.html.twig', array(
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
    
}