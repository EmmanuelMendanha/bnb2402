<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    // Page de contact de BnB
    #[Route('/contact', name: 'contact')]
    public function contact(
        Request $request // ici on injecte la classe Request dans la methode
    ): Response
    {
        $form = $this->createForm(ContactType::class); // ici on charge le formulaire
        $form->handleRequest($request); // ici on traite la requete
        
        /**
         * Traitement du formulaire
         * Si le formulaire est soumis et qu'il est valide
         * alors on récupère les données du formulaire
         * et on les envoie par mail (pour le test on "dump and die" )
         */

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dd($data);
        }
        return $this->render('page/contact.html.twig', [
            'contactForm' => $form,
        ]);
    }
}
