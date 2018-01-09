<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $gender = $options['gender'];
        $builder->add('player1', EntityType::class, [
            'class' => 'AppBundle\Entity\Player',
            'query_builder' => function (EntityRepository $em) use ($gender) {
                return $em->createQueryBuilder('p')->where('p.gender = :gender')
                    ->setParameter('gender', $gender);
            }
        ])
            ->add('player2', EntityType::class, [
                'class' => 'AppBundle\Entity\Player',
                'query_builder' => function (EntityRepository $em) use ($gender) {
                    return $em->createQueryBuilder('p')->where('p.gender = :gender')
                        ->setParameter('gender', $gender);
                }
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Game'
        ]);
        $resolver->setRequired(['gender']);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tournament';
    }


}
