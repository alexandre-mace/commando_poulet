<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Round;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoundType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('action', ChoiceType::class,[
                'label' => 'Que faire ?',
                'choices'  => array(
                    'Attaquer' => 'attack',
                    'Améliorer l\'attaque' => 'upgrade',
                    'Se soigner' => 'heal',
                    'Quitter' => 'leave'
                ),
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
