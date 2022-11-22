<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Session;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SessionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Session::class;
    }

    //configuration formulaire
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name_session','Nom session'),            
            TextField::new('desc_short_session', 'Description courte session'),
            TextEditorField::new('desc_long_session', 'Description longue session'),
            //DateTimeField::new('start_date_session', 'Date début de formation')->onlyOnForms(),
            DateField::new('start_date_session', 'Date début de formation')->onlyOnForms(),
            //DateTimeField::new('end_date_session', 'Date fin de formation')->onlyOnForms(),
            DateField::new('end_date_session', 'Date fin de formation')->onlyOnForms(),
            //ImageField::new('img_session', 'Image de la session')->setUploadDir('public/asset/images/')->setBasePath('asset/images/'),
            TextField::new('img_session', 'Image de la session'),
            //ImageField::new('blason_session', 'Image du blason')->setUploadDir('public/asset/blason/')->setBasePath('asset/blason/'),
            TextField::new('blason_session', 'Image du blason'),
            //DateTimeField::new('start_stage1_session', 'Date début stage 1')->onlyOnForms(),
            DateField::new('start_stage1_session', 'Date début stage 1')->onlyOnForms(),
            //DateTimeField::new('end_stage1_session', 'Date fin stage 1')->onlyOnForms(),
            DateField::new('end_stage1_session', 'Date fin stage 1')->onlyOnForms(),
            //DateTimeField::new('start_stage2_session', 'Date début stage 2')->onlyOnForms(),
            DateField::new('start_stage2_session', 'Date début stage 2')->onlyOnForms(),
            //DateTimeField::new('end_stage2_session', 'Date fin stage 2')->onlyOnForms(),
            DateField::new('end_stage2_session', 'Date fin stage 2')->onlyOnForms(),
            IntegerField::new('nbr_stg_session', 'Nombre stagiaire')->onlyOnForms(),
            IntegerField::new('nbr_place_session', 'Nombre de place disponible')->onlyOnForms(),
            IntegerField::new('success_title_session', 'Pourcentage stagiaire avec le titre')->onlyOnForms(),
            IntegerField::new('occupation_integration_session', 'Pourcentage stagiaire en emploi')->onlyOnForms(),
            AssociationField::new('id_former', 'Formateur référent')->onlyOnForms(),
            AssociationField::new('id_type_session', 'Filière')->onlyOnForms(),
            AssociationField::new('skills', 'Compétence de la formation')->onlyOnForms(),
        ];
    }
    
}
