<?php

namespace App\Controller;

use App\Entity\Camara;
use App\Form\CamaraType;
use App\Repository\CamaraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/camara")
 */
class CamaraController extends Controller
{
    /**
     * @Route("/", name="camara_index", methods="GET")
     */
    public function index(CamaraRepository $camaraRepository): Response
    {
        return $this->render('camara/index.html.twig', ['camaras' => $camaraRepository->findAll()]);
    }

    /**
     * @Route("/new", name="camara_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $camara = new Camara();
        $form = $this->createForm(CamaraType::class, $camara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($camara);
            $em->flush();

            return $this->redirectToRoute('camara_index');
        }

        return $this->render('camara/form.html.twig', [
            'camara' => $camara,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="camara_show", methods="GET")
     */
    public function show(Camara $camara): Response
    {
        return $this->render('camara/show.html.twig', ['camara' => $camara]);
    }

    /**
     * @Route("/{id}/edit", name="camara_edit", methods="GET|POST")
     */
    public function edit(Request $request, Camara $camara): Response
    {
        $form = $this->createForm(CamaraType::class, $camara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('camara_index');
        }

        return $this->render('camara/form.html.twig', [
            'camara' => $camara,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="camara_delete", methods="DELETE")
     */
    public function delete(Request $request, Camara $camara): Response
    {
        if ($this->isCsrfTokenValid('delete'.$camara->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($camara);
            $em->flush();
        }

        return $this->redirectToRoute('camara_index');
    }
}
