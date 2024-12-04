<?php

namespace App\Form;

use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class CoursModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => 'Libellé du cours',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom du cours']
            ])
            ->add('ageMini', IntegerType::class, [
                'label' => 'Âge minimum',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Âge minimum requis']
            ])
            ->add('heureDebut', TimeType::class, [
                'label' => 'Heure de début',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('heureFin', TimeType::class, [
                'label' => 'Heure de fin',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('jour', EntityType::class, [
                'class' => 'App\Entity\Jour',
                'choice_label' => 'libelle',
                'label' => 'Jour',
                'attr' => ['class' => 'form-control']
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Modifier cours',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function getParent()
    {
        return CoursType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
