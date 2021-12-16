<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ArticlesType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @var ContactRepository
     * */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ArticlesType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();
        }

        return $this->render('pages/contact.html.twig', [
            'contacts' => $this->contactRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/contact/{id}", name="contactId")
     */
    public function ContactIds(Request $request, int $id): Response
    {
        return $this->render('pages/contact.html.twig', [
            'contact' => $this->contactRepository->find($id)
        ]);
    }

}

