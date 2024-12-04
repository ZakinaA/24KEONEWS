<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Responsable;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EleveModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('enregistrer')
            ->add('nom', TextType::class, [
                'label' => 'Nom Élève', 
                'disabled' => true,
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom de l\'élève']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom Élève',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Prénom de l\'élève']
            ])
            ->add('numRue', IntegerType::class, [
                'label' => 'Numéro de Rue',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de rue']
            ])
            ->add('rue', TextType::class, [
                'label' => 'Rue',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom de la rue']
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
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de téléphone']
            ])
            ->add('mail', TextType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Adresse email']
            ])
            ->add('responsable', EntityType::class, [
                'class' => Responsable::class,
                'choice_label' => 'nom',
                'label' => 'Responsable',
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Modifier Élève',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function getParent()
    {
        return EleveType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
