<?php

namespace App\Form;

use App\Entity\Intervention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDebut', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => ['class' => 'form-control'] // Ajout de la classe CSS
            ])
            ->add('dateFin', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => ['class' => 'form-control'] // Ajout de la classe CSS
            ])
            ->add('descriptif', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Description de l\'intervention'] // Ajout de la classe CSS et placeholder
            ])
            ->add('prix', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Prix de l\'intervention'] // Ajout de la classe CSS et placeholder
            ])
            ->add('quotite', NumberType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Quotité'] // Ajout de la classe CSS et placeholder
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Nouvelle intervention',
                'attr' => ['class' => 'btn btn-primary'] // Ajout de la classe CSS pour le bouton
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}
