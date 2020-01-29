<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Firstname',TextType::class, ['label'=> 'Prénom'])
            ->add('Lastname',TextType::class, ['label'=> 'Nom'])
            ->add('Date')
            ->add('City',TextType::class, ['label'=> 'Ville'])
            ->add('ReducedTickets',TextType::class, ['label'=> 'Tarifs réduits'])
            ->add('FullPrice',TextType::class, ['label'=> 'Plein tarif'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
