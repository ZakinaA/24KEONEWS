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

class InterventionModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDebut', DateType::class, ['widget' => 'single_text','format' => 'yyyy-MM-dd',])
            ->add('dateFin', DateType::class, ['widget' => 'single_text','format' => 'yyyy-MM-dd',])
            ->add('descriptif', TextType::class)
            ->add('prix', NumberType::class)
            ->add('quotite', NumberType::class)
            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier intervention'))
        ;
    }

    public function getParent(){
        return InterventionType::class;
      }
   

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}
