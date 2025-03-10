<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name', TextType::class, ['label' => 'Nom de la voiture'])
      ->add('description', TextType::class, ['label' => 'Description'])
      ->add('price', NumberType::class, ['label' => 'Prix journalier'])
      ->add('price_monthly', NumberType::class, ['label' => 'Prix mensuel'])
      ->add('places', ChoiceType::class, [
        'label' => 'Nombre de places',
        'choices' => range(1, 9, 1),
        'choice_label' => function ($choice) {
          return $choice;
        },
      ])
      ->add('gearbox', ChoiceType::class, [
        'label' => 'Boîte de vitesse',
        'choices' => [
          'Manuelle' => true,
          'Automatique' => false,
        ],
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Car::class,
    ]);
  }
}
