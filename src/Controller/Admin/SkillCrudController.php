<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Skill::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name_skill', 'Nom Compétence'),
            TextField::new('desc_short_skill', 'Description Courte Compétence'),
            TextEditorField::new('desc_long_skill', 'Description longue Compétence'),
            ImageField::new('img_skill', 'Illustration Compétence')->setUploadDir('public/asset/skill/')->setBasePath('asset/skill/'),
        ];
    }
}
