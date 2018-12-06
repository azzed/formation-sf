<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom", "Votre prénom ..."))
            ->add('lastName', TextType::class, $this->getConfiguration("Nom", "Votre nom ..."))
            ->add('picture', UrlType::class, $this->getConfiguration("Photo", "l'url de votre avatar"))
            ->add('email', EmailType::class, $this->getConfiguration('Email', 'Votre email ...'))
            ->add('hash', PasswordType::class, $this->getConfiguration('mot de passs', 'Choisissez un bon mot de passe ...'))
            ->add('passwordConfirmation', PasswordType::class, $this->getConfiguration('Confirmez le mot de passe', 'Veuillez confirmer le mot de passe'))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Presentez vous en quelques mot ..."))
            ->add('description', TextareaType::class, $this->getConfiguration("Description detaillée", "C'est le moment de vous presentez en detail ..."));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
