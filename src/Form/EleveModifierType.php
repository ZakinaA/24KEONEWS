<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EleveModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('enregistrer')
            ->add('nom', TextType::class, [
                'label' => 'Nom Élève', 
                'disabled' => true,
            ])
            ->add('prenom', TextType::class, ['label' => 'Prénom Élève'])
            ->add('numRue', IntegerType::class, ['label' => 'Numéro de Rue'])
            ->add('rue', TextType::class, ['label' => 'Rue'])
            ->add('copos', IntegerType::class, ['label' => 'Code Postal'])
            ->add('ville', TextType::class, ['label' => 'Ville'])
            ->add('tel', IntegerType::class, ['label' => 'Téléphone'])
            ->add('mail', TextType::class, ['label' => 'Email'])
            ->add('enregistrer', SubmitType::class, ['label' => 'Modifier Élève']);
    }
 
    public function getParent(){
        return EleveType::class;
    }
 
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}