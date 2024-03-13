<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BookingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booking::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', '📆 All bookings')
            ->setEntityLabelInSingular('Booking')
            ->setEntityLabelInPlural('Bookings')
            ->setSearchFields(['title'])
            ->setDefaultSort(['id' => 'DESC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Bookings Informations'),
            IdField::new('id')->hideOnIndex(),
            DateField::new('date start')
                ->setLabel('Start Date')
                ->setFormat('dd-MM-yyyy')
                ->setHelp('when the booking will start ?'),
            DateField::new('date end')
                ->setLabel('End Date')
                ->setFormat('dd-MM-yyyy')
                ->setHelp('when the booking will end ?'),
            TextField::new('ref')
                ->hideOnIndex()
                ->setLabel('Booking eference')
                ->setHelp('what is the booking\'s reference'),
            IntegerField::new('guest')
                ->setLabel('Number of guests')
                ->setHelp('how many guests will be there ?'),
        ];
    }
    
}
