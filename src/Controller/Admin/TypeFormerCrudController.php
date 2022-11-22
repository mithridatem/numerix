<?php

namespace App\Controller\Admin;

use App\Entity\TypeFormer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
class TypeFormerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeFormer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name_type_former', 'Filère Formateur'),
        ];
    }
}
