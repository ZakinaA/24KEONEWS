<?php

namespace App\Form;

use App\Entity\Instrument;
use App\Form\InstrumentFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InstrumentModifierType extends AbstractType
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
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Modifier Instrument',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function getParent()
    {
        return InstrumentFormType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }
}
