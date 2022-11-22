<?php

namespace App\Controller\Admin;

use App\Entity\Administrateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdministrateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Administrateur::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
