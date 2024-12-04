<?php

namespace App\Form;

use App\Entity\Instrument;
use App\Entity\TypeInstrument;
use App\Entity\Accessoire;
use App\Entity\Marque;
use App\Entity\Modele; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InstrumentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NumSerie', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Numéro de série']
            ])
            ->add('dateAchat', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => ['class' => 'form-control']
            ])
            ->add('prixAchat', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Prix d\'achat']
            ])
            ->add('utilisation', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Utilisation']
            ])
            ->add('couleur', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Couleur']
            ])
            ->add('typeinstrument', EntityType::class, [
                'class' => TypeInstrument::class,
                'choice_label' => 'libelle',
                'placeholder' => 'Choisir un type',
                'attr' => ['class' => 'form-control']
            ])
            ->add('accessoires', EntityType::class, [
                'class' => Accessoire::class,
                'choice_label' => 'libelle',
                'multiple' => true,
                'expanded' => true,
                'placeholder' => 'Choisir des accessoires',
                'attr' => ['class' => 'form-control']
            ])
            ->add('marque', EntityType::class, [
                'class' => Marque::class,
                'choice_label' => 'libelle',
                'placeholder' => 'Choisir une marque',
            ])
            ->add('modele', EntityType::class, [
                'class' => Modele::class,
                'choice_label' => 'libelle',
                'placeholder' => 'Choisir un modèle',
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Nouvel Instrument',
                'attr' => ['class' => 'btn btn-primary']
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }
}
