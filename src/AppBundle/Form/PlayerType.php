<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',null ,[
            'attr' => [
                'class' => 'form-control',
            ]
        ])->add('age',null ,[
            'attr' => [
                'class' => 'form-control',
            ]
        ])->add('gender', ChoiceType::class, [
            'required' => true,
            'multiple' => false,
            'choices' => [
                'Homme' => 'Male',
                'Femme' => 'Female',
            ],
            'label' => 'Sexe',
            'attr' => [
                'class' => 'form-control',
            ]]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Player'
        ));
        $resolver->setRequired(['gender']);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_player';
    }


}
