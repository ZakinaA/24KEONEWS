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
            'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez le nom'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('prenom', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez le prénom'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('numRue', IntegerType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de rue'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('rue', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez la rue'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('copos', IntegerType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez le code postal'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('ville', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez la ville'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('tel', TelType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez le numéro de téléphone'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('mail', EmailType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez l\'email'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('enregistrer', SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary mt-3'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}

