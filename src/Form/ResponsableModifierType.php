<?php

namespace App\Form;

use App\Entity\Responsable;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ResponsableModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('enregistrer')
            ->add('nom', TextType::class, [
                'label' => 'Nom Responsable',
                'disabled' => true,
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom du responsable']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom Responsable',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Prénom du responsable']
            ])
            ->add('numRue', IntegerType::class, [
                'label' => 'Numéro de Rue',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de rue']
            ])
            ->add('rue', TextType::class, [
                'label' => 'Rue',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Rue']
            ])
            ->add('copos', IntegerType::class, [
                'label' => 'Code Postal',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Code postal']
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ville']
            ])
            ->add('tel', IntegerType::class, [
                'label' => 'Téléphone',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Téléphone']
            ])
            ->add('mail', TextType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Email']
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Modifier Responsable',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function getParent()
    {
        return ResponsableType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}
