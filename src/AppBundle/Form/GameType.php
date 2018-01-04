<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    const HUMIDE = 1;
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('meteo', ChoiceType::class, [
                'required' => true,
                'multiple' => false,
                'choices' => [
                    'Humide' => self::HUMIDE,
                    'Sec' => 'sec',
                    'Vent' => 'vent',
                    'Ensoleiller' => 'ensoleiller',
                ],
                'label' => 'Metéo',
                'attr' => [
                    'class' => '',
                    'placeholder' => 'Ex : humide',
                ]])
            ->add('player1_score')
            ->add('player2_score')
            ->add('player1')
            ->add('player2')
            ->add('tournaments')
            ->add('terrain', ChoiceType::class, [
                'required' => true,
                'multiple' => false,
                'choices' => [
                    'Dur' => 'dur',
                    'Gazon' => 'gazon',
                    'Indoor' => 'indoor',
                    'Moquette' => 'moquette',
                    'Parquet' => 'parquet',
                    'Synthétique' => 'synthetique',
                    'Terre battue' => 'Terre-battue',
                ],
                'label' => 'Type de terrains',
                'attr' => [
                    'class' => '',
                    'placeholder' => 'Ex : terrain dur  ',
                ]])
            ->add('date');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Game'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_game';
    }


}
