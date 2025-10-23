<?php

namespace App\Form;

use App\Entity\Chambremhadhbichaima;
use App\Entity\Hospitalmhadhbichaima ;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChambremhadhbichaimaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numch')
            ->add('patient')
            ->add('Hospitalmhadhbichaima', EntityType::class, [
                'class' => Hospital::class,
                'choice_label' => 'nom',
            ])
            ->add('save',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chambremhadhbichaima::class,
        ]);
    }
}
