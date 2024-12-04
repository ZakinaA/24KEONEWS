<?php

namespace App\Form;

use App\Entity\Professionnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProfessionnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom du professionnel']
            ])
            ->add('numRue', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de rue']
            ])
            ->add('rue', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Rue']
            ])
            ->add('copos', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Code Postal']
            ])
            ->add('ville', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ville']
            ])
            ->add('tel', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Téléphone']
            ])
            ->add('mail', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Email']
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Nouveau professionnel',
                'attr' => ['class' => 'btn btn-primary'] // Ajout de la classe CSS pour le bouton
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professionnel::class,
        ]);
    }
}
