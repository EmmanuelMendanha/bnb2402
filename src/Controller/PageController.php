<?php
namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    // Page d'accueil de l'application
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
        ]);
    }
    
    // Page a propos de BnB
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('page/about.html.twig', [
        ]);
    }

    // Page des offres de BnB
    #[Route('/offers', name: 'offers')]
    public function offers(): Response
    {
        return $this->render('page/offers.html.twig', [
        ]);
    }

    // Page des villes de BnB
    #[Route('/cities', name: 'cities')]
    public function cities(): Response
    {
        return $this->render('page/cities.html.twig', [
        ]);
    }

    // Page de contact de BnB
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('page/contact.html.twig', [
            'contactForm' => $form,
        ]);
    }

    // Page d'accueil de l'application
    #[Route('/profile', name: 'profile')]
    public function profile(): Response
    {
        return $this->render('page/profile.html.twig', [
        ]);
    }

    // Page de redirection après l'inscription et la confirmation de l'adresse mail
    #[Route('/after-register', name: 'after_register')]
    public function afterRegister(): Response
    {
        return $this->render('page/after-register.html.twig', [
        ]);
    }

}
