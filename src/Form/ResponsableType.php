<?php

namespace App\Form;

use App\Entity\Responsable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom du responsable']
            ])
            ->add('prenom', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Prénom du responsable']
            ])
            ->add('numRue', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de rue']
            ])
            ->add('rue', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Rue']
            ])
            ->add('copos', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Code postal']
            ])
            ->add('ville', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ville']
            ])
            ->add('tel', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Téléphone']
            ])
            ->add('mail', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Email']
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Nouveau Responsable',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}
