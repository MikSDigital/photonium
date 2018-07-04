<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\DemoType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/semantic_ui", name="semantic_ui")
     */
    public function uiButtons()
    {
        return $this->render('default/semantic_ui.html.twig', [
        ]);
    }
    
    /**
     * @Route("/form", name="form_demo")
     */
    public function forms()
    {
        $form = $this->createForm(DemoType::class);
        return $this->render('default/form_demo.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
