<?php

namespace App\Form;

use App\Entity\QuotientFamilial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class QuotientFamilialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez le libelle'],
                'label_attr' => ['class' => 'form-label'],
            ])
            
            ->add('quotientMini', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Quotient minimal'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-3'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuotientFamilial::class,
        ]);
    }
}
