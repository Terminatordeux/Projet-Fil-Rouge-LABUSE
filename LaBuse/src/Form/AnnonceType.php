<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre_ann')
            ->add('texte_ann')
            ->add('date_ann')
            ->add('type_ann')
            ->add('annonce_validé')
            ->add('type')
            ->add('etat')
            ->add('techno')
            ->add('utilisateur')
            ->add('adresse')
            ->add('marque')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
