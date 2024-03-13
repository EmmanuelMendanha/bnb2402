<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Offer;
use App\Entity\Images;
use App\Entity\Review;
use App\Entity\Booking;
use App\Entity\Favorite;
use App\Entity\Equipment;
use App\Repository\UserRepository;
use App\Repository\OfferRepository;
use App\Repository\BookingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    private BookingRepository $bookingRepository;
    private OfferRepository $offerRepository;
    private UserRepository $userRepository;

    public function __construct(
    BookingRepository $bookingRepository,
    OfferRepository $offerRepository, 
    UserRepository $userRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->offerRepository = $offerRepository;
        $this->userRepository = $userRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $bookings = $this->bookingRepository->findAll();
        $offers = $this->offerRepository->findAll();
        $users = $this->userRepository->findAll();
    

        return $this->render('admin/dashboard.html.twig', [
            'bookings' => $bookings,
            'offers' => $offers,
            'users' => $users,
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bnb2402');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Booking', 'fas fa-list', Booking::class);
        yield MenuItem::linkToCrud('Equipment', 'fas fa-list', Equipment::class);
        yield MenuItem::linkToCrud('Favorite', 'fas fa-list', Favorite::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-list', Images::class);
        yield MenuItem::linkToCrud('Offer', 'fas fa-list', Offer::class);
        yield MenuItem::linkToCrud('Review', 'fas fa-list', Review::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToRoute('Back to website', 'fa fa-arrow-left', 'home');
    }
}
