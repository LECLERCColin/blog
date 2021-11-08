<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'Michel',

        ]);
    }
    /**
     * @Route("/contact/{type}", name="contactType")
     */
    public function types(Request $request, string $type): Response{
        $name = $request->query->get('controller_name');
        return $this->render('contact/index.html.twig', [
            'controller_name'=> $name,
            'type' => $type,
        ]);
    }
}
