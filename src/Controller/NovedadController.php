<?php

namespace App\Controller;

use App\Entity\Novedad;
use App\Form\NovedadType;
use App\Repository\NovedadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/novedad")
 */
class NovedadController extends Controller
{
    /**
     * @Route("/", name="novedad_index", methods="GET")
     */
    public function index(NovedadRepository $novedadRepository): Response
    {
        return $this->render('novedad/index.html.twig', ['novedads' => $novedadRepository->findAll()]);
    }

    /**
     * @Route("/new", name="novedad_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $novedad = new Novedad();
        $novedad->setFecha(new \DateTime());
        $form = $this->createForm(NovedadType::class, $novedad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($novedad);
            $em->flush();

            return $this->redirectToRoute('novedad_index');
        }

        return $this->render('novedad/new.html.twig', [
            'novedad' => $novedad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="novedad_show", methods="GET")
     */
    public function show(Novedad $novedad): Response
    {
        return $this->render('novedad/show.html.twig', ['novedad' => $novedad]);
    }

    /**
     * @Route("/{id}/edit", name="novedad_edit", methods="GET|POST")
     */
    public function edit(Request $request, Novedad $novedad): Response
    {
        $form = $this->createForm(NovedadType::class, $novedad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('novedad_edit', ['id' => $novedad->getId()]);
        }

        return $this->render('novedad/edit.html.twig', [
            'novedad' => $novedad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="novedad_delete", methods="DELETE")
     */
    public function delete(Request $request, Novedad $novedad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$novedad->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($novedad);
            $em->flush();
        }

        return $this->redirectToRoute('novedad_index');
    }
}
