<?php

namespace App\Form;

use App\Entity\Metier;
use App\Entity\Professionnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MetierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('libelle', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Libellé']
        ])
        ->add('professionnel', EntityType::class, [
            'class' => professionnel::class,
            'choice_label' => 'nom',
            'multiple' => true,
            'attr' => ['class' => 'form-control']
        ])
        ->add('enregistrer', SubmitType::class, [
            'label' => 'Nouveau métier',
            'attr' => ['class' => 'btn btn-primary']
        ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Metier::class,
        ]);
    }
}
