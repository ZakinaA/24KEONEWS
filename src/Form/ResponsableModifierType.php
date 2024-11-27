<?php

namespace App\Form;

use App\Entity\Responsable;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ResponsableModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->remove('enregistrer')
        ->add('nom', TextType::class, [
            'label' => 'Nom Responsable', 
            'disabled' => true,
        ])
        ->add('prenom', TextType::class, ['label' => 'Prénom Responsable'])
        ->add('numRue', IntegerType::class, ['label' => 'Numéro de Rue'])
        ->add('rue', TextType::class, ['label' => 'Rue'])
        ->add('copos', IntegerType::class, ['label' => 'Code Postal'])
        ->add('ville', TextType::class, ['label' => 'Ville'])
        ->add('tel', IntegerType::class, ['label' => 'Téléphone'])
        ->add('mail', TextType::class, ['label' => 'Email'])
        ->add('enregistrer', SubmitType::class, ['label' => 'Modifier Responsable']);
    }

    public function getParent(){
        return ResponsableType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}