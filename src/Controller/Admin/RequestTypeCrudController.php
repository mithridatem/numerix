<?php

namespace App\Controller\Admin;

use App\Entity\RequestType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RequestTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RequestType::class;
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
