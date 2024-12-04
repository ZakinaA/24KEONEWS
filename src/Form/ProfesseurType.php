<?php

namespace App\Form;

use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Entrez le nom']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['placeholder' => 'Entrez le prénom']
            ])
            ->add('numRue', IntegerType::class, [
                'label' => 'Numéro de rue',
                'attr' => ['placeholder' => 'Entrez le numéro de rue']
            ])
            ->add('rue', TextType::class, [
                'label' => 'Rue',
                'attr' => ['placeholder' => 'Entrez la rue']
            ])
            ->add('copos', IntegerType::class, [
                'label' => 'Code postal',
                'attr' => ['placeholder' => 'Entrez le code postal']
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'attr' => ['placeholder' => 'Entrez la ville']
            ])
            ->add('tel', TelType::class, [
                'label' => 'Téléphone',
                'attr' => ['placeholder' => 'Entrez le numéro de téléphone']
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Email',
                'attr' => ['placeholder' => 'Entrez l\'email']
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Enregistrer Professeur'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}

