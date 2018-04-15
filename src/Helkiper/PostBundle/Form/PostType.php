<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 14.04.2018
 * Time: 14:41
 */

namespace Helkiper\PostBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PostType
 * @package Helkiper\PostBundle
 */
class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('header')
            ->add('content')
            ->add('comments', CollectionType::class, [
                'entry_type' => CommentType::class,
                'entry_options' => ['label' => false],
                'by_reference' => false,
                'prototype' => true,
                'allow_add' => true
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Helkiper\PostBundle\Entity\Post'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'helkiper_post_post';
    }
}