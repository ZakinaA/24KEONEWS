<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Eleve;
use App\Entity\Inscription;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('dateInscription', DateType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Date d\'inscription']
    ])
    ->add('cours', EntityType::class, [
        'class' => Cours::class,
        'choice_label' => 'libelle',
        'attr' => ['class' => 'form-control']
    ])
    ->add('eleve', EntityType::class, [
        'class' => Eleve::class,
        'choice_label' => 'nom',
        'attr' => ['class' => 'form-control']
    ])
    ->add('enregistrer', SubmitType::class, [
        'label' => 'Nouveau cours',
        'attr' => ['class' => 'btn btn-primary']
    ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
