<?php

namespace App\Controller;

use App\Entity\Asunto;
use App\Form\AsuntoType;
use App\Repository\AsuntoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/asunto")
 */
class AsuntoController extends Controller
{
    /**
     * @Route("/", name="asunto_index", methods="GET")
     */
    public function index(AsuntoRepository $asuntoRepository): Response
    {
        return $this->render('asunto/index.html.twig', ['asuntos' => $asuntoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="asunto_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $asunto = new Asunto();
        $form = $this->createForm(AsuntoType::class, $asunto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asunto);
            $em->flush();

            return $this->redirectToRoute('asunto_index');
        }

        return $this->render('asunto/_form.html.twig', [
            'asunto' => $asunto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="asunto_show", methods="GET")
     */
    public function show(Asunto $asunto): Response
    {
        return $this->render('asunto/show.html.twig', ['asunto' => $asunto]);
    }

    /**
     * @Route("/{id}/edit", name="asunto_edit", methods="GET|POST")
     */
    public function edit(Request $request, Asunto $asunto): Response
    {
        $form = $this->createForm(AsuntoType::class, $asunto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('asunto_index');
        }

        return $this->render('asunto/_form.html.twig', [
            'asunto' => $asunto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="asunto_delete", methods="DELETE")
     */
    public function delete(Request $request, Asunto $asunto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$asunto->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($asunto);
            $em->flush();
        }

        return $this->redirectToRoute('asunto_index');
    }
}
