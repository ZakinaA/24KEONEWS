<?php

namespace App\Form;

use App\Entity\TypeInstrument;
use App\Entity\ClasseInstrument;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

class TypeInstrumentModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => 'Libellé',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le libellé du type d\'instrument',
                ],
            ])
            ->add('classeInstrument', EntityType::class, [
                'label' => 'Classe Instrument',
                'class' => ClasseInstrument::class,
                'choice_label' => 'libelle', 
                'placeholder' => 'Choisissez une classe',
                'attr' => ['class' => 'form-select'],
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Modifier TypeInstrument',
                'attr' => [
                    'class' => 'btn btn-primary mt-3',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeInstrument::class, 
        ]);
    }
}

