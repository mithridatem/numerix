<?php

namespace App\Controller\Admin;

use App\Entity\RequestContact;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
class RequestContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RequestContact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('subject_request_contact', 'objet'),
            TextEditorField::new('content_request_contact', 'Contenu'),
            TelephoneField::new('phone_request_contact', 'Téléphone'),
            TextField::new('mail_request_contact', 'Mail'),            
            TextField::new('company_name_request_contact', 'Entreprise'),            
            AssociationField::new('id_request_type', 'Type contact'),            
        ];
    }
}
