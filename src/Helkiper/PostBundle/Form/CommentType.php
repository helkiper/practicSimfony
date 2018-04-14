<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 14.04.2018
 * Time: 20:38
 */

namespace Helkiper\PostBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Helkiper\PostBundle\Entity\Comment'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'helkiper_post_comment';
    }
}