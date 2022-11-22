<?php

namespace App\Controller\Admin;

use App\Entity\TypeSession;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
class TypeSessionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeSession::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name_type_session', 'Filère Session'),
        ];
    }
}
