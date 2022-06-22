<?php

namespace App\Controller\Admin;

use App\Entity\Dept;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DeptCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dept::class;
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
