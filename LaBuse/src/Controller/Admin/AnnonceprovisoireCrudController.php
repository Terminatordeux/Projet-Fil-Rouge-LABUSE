<?php

namespace App\Controller\Admin;

use App\Entity\Annonceprovisoire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnnonceprovisoireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonceprovisoire::class;
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
