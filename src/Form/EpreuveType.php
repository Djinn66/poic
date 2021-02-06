<?php

namespace App\Form;

use App\Entity\Epreuve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EpreuveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule')
            ->add('categorie', ChoiceType::class,[
                'placeholder'=> 'Catégorie...',
                'choices'=> [
                    "CCPM" => "CCPM",
                    "POIC" => "POIC",
                    "CCPS" => "CCPS"
                ]
            ])
            ->add('type')
            ->add('calcul')
            ->add('periodicite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Epreuve::class,
        ]);
    }
}
