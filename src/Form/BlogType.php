<?php

namespace App\Form;

use App\Entity\Blog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name');
        $builder->add('intro', TextareaType::class, [
            'required' => false,
            'attr' => [
                'data-controller' => 'easymde',
            ],
        ]);
        $builder->add('content', TextareaType::class, [
            'required' => false,
            'attr' => [
                'data-controller' => 'easymde',
            ],
        ]);
        $builder->add('publish_date', DateTimeType::class, [
            'required' => false,
            'html5' => false,
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd HH:mm',
            'constraints' => new DateTime(format: 'Y-m-d H:i', groups: ['string']),
            'attr' => [
                'data-controller' => 'flatpickr',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    }
}
