<?php

namespace App\Controller;

use App\Entity\Incidente;
use App\Form\IncidenteType;
use App\Repository\IncidenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\IncidenteBoardType;

/**
 * @Route("/incidente")
 */
class IncidenteController extends Controller
{
    /**
     * @Route("/", name="incidente_index", methods="GET")
     */
    public function index(IncidenteRepository $incidenteRepository): Response
    {
        return $this->render('incidente/index.html.twig', ['incidentes' => $incidenteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="incidente_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $incidente = new Incidente();
        $form = $this->createForm(IncidenteType::class, $incidente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($incidente);
            $em->flush();

            return $this->redirectToRoute('incidente_index');
        }

        return $this->render('incidente/form.html.twig', [
            'incidente' => $incidente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="incidente_show", methods="GET")
     */
    public function show(Incidente $incidente): Response
    {
        return $this->render('incidente/show.html.twig', ['incidente' => $incidente]);
    }

    /**
     * @Route("/{id}/edit", name="incidente_edit", methods="GET|POST")
     */
    public function edit(Request $request, Incidente $incidente): Response
    {
        $form = $this->createForm(IncidenteType::class, $incidente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('incidente_index');
        }

        return $this->render('incidente/form.html.twig', [
            'incidente' => $incidente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="incidente_delete", methods="DELETE")
     */
    public function delete(Request $request, Incidente $incidente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$incidente->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($incidente);
            $em->flush();
        }

        return $this->redirectToRoute('incidente_index');
    }

    /**
     * @Route("/{id}/board", name="incidente_board", methods="GET|POST")
     */
    public function board(Request $request, Incidente $incidente): Response
    {
//         $incidente = new Incidente();
        $form = $this->createForm(IncidenteBoardType::class, $incidente);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($incidente);
            $em->flush();
            
            return $this->redirectToRoute('incidente_index');
        }
        
        return $this->render('incidente/board.html.twig', [
            'incidente' => $incidente,
            'form' => $form->createView(),
        ]);
    }
    
    
}
