<?php

namespace App\Form;

use App\Entity\Armee;
use App\Entity\Grade;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class GradeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule', TextType::class)
            ->add('abreviation', TextType::class)
            ->add('armees', EntityType::class,[
                'class'=> Armee::class,
//                'expanded' => true,
                'multiple'=>true,
            ])
            ->add('categorie',ChoiceType::class,[
                'placeholder'=> 'Catégorie...',
                'choices' => [
                    'Officier' => 'Officier',
                    'Sous-officer' => 'Sous-officer',
                    'Militaire du rang' => 'Militaire du rang',]
            ])
            ->add('rang',IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Grade::class,
        ]);
    }
}
