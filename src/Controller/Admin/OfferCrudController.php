<?php

namespace App\Controller\Admin;

use App\Entity\Offer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class OfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offer::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', '📆 All offers')
            ->setEntityLabelInSingular('Offer')
            ->setEntityLabelInPlural('Offers')
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
            IdField::new('id')->hideOnIndex(),
            TextField::new('title')
                ->setLabel('Offer Title')
                ->setHelp('Give a title to your offer'),
            MoneyField::new('price')->setCurrency('EUR')
                ->hideOnIndex()
                ->setLabel('Price')
                ->setHelp('How much the offer cost ?'),
            IntegerField::new('capacity')
                ->hideOnIndex()
                ->setLabel('Capacity')
                ->setHelp('How many people can be hosted ?'),
            TextField::new('address')
                ->setLabel('Address')
                ->setHelp('Where is the offer located ?'),
            TextField::new('city')
                ->setLabel('City')
                ->setHelp('In which city is the offer located ?'),
            TextField::new('country')
                ->setLabel('Country')
                ->setHelp('In which country is the offer located ?'),

        ];
    }
   
}
