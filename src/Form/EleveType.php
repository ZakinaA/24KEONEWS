<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Responsable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EleveType extends AbstractType
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
                'attr' => ['class' => 'form-control', 'placeholder' => 'Rue'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('copos', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Code postal'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('ville', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ville'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('tel', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de téléphone'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('mail', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Adresse e-mail'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('responsable', EntityType::class, [
                'class' => Responsable::class,
                'choice_label' => 'nom',
                'label' => 'Responsable',
                'required' => true,
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-3'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
