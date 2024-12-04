<?php

namespace App\Form;

use App\Entity\Professionnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProfessionnelModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom du professionnel'] // Ajout de la classe CSS
            ])
            ->add('numRue', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de rue'] // Ajout de la classe CSS
            ])
            ->add('rue', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Rue'] // Ajout de la classe CSS
            ])
            ->add('copos', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Code Postal'] // Ajout de la classe CSS
            ])
            ->add('ville', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ville'] // Ajout de la classe CSS
            ])
            ->add('tel', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Téléphone'] // Ajout de la classe CSS
            ])
            ->add('mail', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Email'] // Ajout de la classe CSS
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Modifier professionnel',
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
