<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;


class GameType extends AbstractType
{
    const HUMIDE = 1;
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $gender = $options['gender'];
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
                    'class' => 'form-control',
                    'placeholder' => 'Ex : humide',
                ]])
            ->add('player1_score',null ,[
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('player2_score',null ,[
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('player1', EntityType::class, [
                'class' => 'AppBundle\Entity\Player',
                'attr' => [
                    'class' => 'form-control',
                ],
                'query_builder' => function (EntityRepository $em) use ($gender) {
                    return $em->createQueryBuilder('p')->where('p.gender = :gender')
                        ->setParameter('gender', $gender);
                }
            ])
            ->add('player2', EntityType::class, [
                'class' => 'AppBundle\Entity\Player',
                'attr' => [
                    'class' => 'form-control',
                ],
                'query_builder' => function (EntityRepository $em) use ($gender) {
                    return $em->createQueryBuilder('p')->where('p.gender = :gender')
                        ->setParameter('gender', $gender);
                }
            ])
            ->add('tournaments',null ,[
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
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
                    'class' => 'form-control',
                    'placeholder' => 'Ex : terrain dur  ',
                ]])
            ->add('date');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Game',
        ));
        $resolver->setRequired(['gender']);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_game';
    }


}
