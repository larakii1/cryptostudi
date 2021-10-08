<?php

namespace App\Form;

use App\Entity\TransactionCrypto;
use App\Entity\Crypto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TransactionCryptoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add(
                'crypto_id',
                EntityType::class,
                [
                    'attr' => ['class' => 'form-select form-select-md mb-3'],
                    'class' => Crypto::class,
                    'choice_label' => function (Crypto $crypto) {
                        return $crypto->getName();
                    },

                ]
            )
            ->add(
                'quantity',
                TextType::class,
                []
            )

            ->add(
                'price',


                null,
                [

                    'mapped' => false,
                ],

            )
            ->add(
                'ajouter',
                SubmitType::class,
                [
                    "attr" => ['class' => "btn btn-primary"]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TransactionCrypto::class,
        ]);
    }
}
