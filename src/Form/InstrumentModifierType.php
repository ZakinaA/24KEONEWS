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
            ->add('NumSerie')
            ->add('dateAchat')
            ->add('prixAchat')
            ->add('utilisation')
            ->add('couleur')
            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier Instrument'));
        ;
    }

    public function getParent(){
        return InstrumentFormType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }
}
