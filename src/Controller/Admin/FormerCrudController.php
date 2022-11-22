<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use App\Entity\Former;
use App\Entity\TypeFormer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FormerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Former::class;
    }

    //configuration formulaire
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name_former', 'Nom Formateur'),
            TextField::new('first_name_former', 'Prénom Formateur'),
            TextField::new('mail_former', 'Mail Formateur'),
            ImageField::new('img_former', 'Photo Formateur')->setUploadDir('public/asset/skill/')->setBasePath('asset/skill/'),
            AssociationField::new('id_type_former', 'Filière Formateurski'),
        ];
    }
}
