<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', '📆 All users')
            ->setEntityLabelInSingular('User')
            ->setEntityLabelInPlural('Users')
            ->setSearchFields(['name'])
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
            EmailField::new('email')->hideOnIndex(),
            TextField::new('firstname')
                ->setLabel('First Name')
                ->setHelp('Enter your first name'),
            TextField::new('lastname')
                ->setLabel('Last Name')
                ->setHelp('Enter your last name'),
            TextField::new('phone')
                ->setLabel('Phone')
                ->setHelp('Enter your phone number'),
            IntegerField::new('rating')
                ->hideOnIndex()
                ->setLabel('Rating')
                ->setHelp('Enter your rating'),
            TextField::new('address')
                ->setLabel('Address')
                ->setHelp('Enter your address'),
            TextField::new('city')
                ->hideOnIndex()
                ->setLabel('City')
                ->setHelp('Enter your city'),
            TextField::new('country')
                ->hideOnIndex()
                ->setLabel('Country')
                ->setHelp('Enter your country'),
        ];
    }

}
