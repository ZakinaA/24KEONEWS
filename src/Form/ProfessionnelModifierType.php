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
            ->add('nom', TextType::class)
            ->add('numRue', NumberType::class)
            ->add('rue', TextType::class)
            ->add('copos', NumberType::class)
            ->add('ville', TextType::class)
            ->add('tel', NumberType::class)
            ->add('mail', TextType::class)
            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier professionnel'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professionnel::class,
        ]);
    }
}
