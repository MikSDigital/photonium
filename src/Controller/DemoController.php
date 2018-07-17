<?php

namespace App\Controller;

use App\Entity\Demo;
use App\Form\Demo1Type;
use App\Repository\DemoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demo")
 */
class DemoController extends Controller
{
    /**
     * @Route("/", name="demo_index", methods="GET")
     */
    public function index(DemoRepository $demoRepository): Response
    {
        return $this->render('demo/index.html.twig', ['demos' => $demoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="demo_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $demo = new Demo();
        $form = $this->createForm(Demo1Type::class, $demo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demo);
            $em->flush();

            return $this->redirectToRoute('demo_index');
        }

        return $this->render('demo/new.html.twig', [
            'demo' => $demo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demo_show", methods="GET")
     */
    public function show(Demo $demo): Response
    {
        return $this->render('demo/show.html.twig', ['demo' => $demo]);
    }

    /**
     * @Route("/{id}/edit", name="demo_edit", methods="GET|POST")
     */
    public function edit(Request $request, Demo $demo): Response
    {
        $form = $this->createForm(Demo1Type::class, $demo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demo_edit', ['id' => $demo->getId()]);
        }

        return $this->render('demo/edit.html.twig', [
            'demo' => $demo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demo_delete", methods="DELETE")
     */
    public function delete(Request $request, Demo $demo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demo);
            $em->flush();
        }

        return $this->redirectToRoute('demo_index');
    }
}
