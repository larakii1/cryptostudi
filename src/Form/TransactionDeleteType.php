<?php

namespace App\Form;

use App\Entity\Transaction;
use App\Entity\Crypto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TransactionDeleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add(
                'crypto',
                EntityType::class,
                [
                    'attr' => ['class' => 'form-select form-select-lg'],
                    'class' => Crypto::class,
                    'choice_label' => function (Crypto $crypto) {
                        return $crypto->getName() . " " . $crypto->getQuantity();
                    },

                ]
            )
            ->add(
                'quantity',
                TextType::class,
                []
            )
            ->add(
                'ajouter',
                SubmitType::class,
                []
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
