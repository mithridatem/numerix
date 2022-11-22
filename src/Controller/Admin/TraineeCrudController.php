<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use App\Entity\Trainee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TraineeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Trainee::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name_trainee', 'Nom Stagiaire'),
            TextField::new('first_name_trainee', 'Prénom Stagiaire'),
            ImageField::new('img_trainee', 'Photo Stagiaire')->setUploadDir('public/asset/stagiaire/')->setBasePath('asset/stagiaire/'),
            TextField::new('mail_trainee', 'Mail Stagiaire'),
            TextField::new('phone_trainee', 'Téléphone Stagiaire'),
        ];
    }
}
