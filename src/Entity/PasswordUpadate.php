<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class PasswordUpadate
{


    private $oldPassword;

    /**
     *
     * @Assert\Length(min=8, minMessage="votre mot de passe doit faire {{ limit }} caractere")
     */
    private $newPassword;

    /**
     *
     * @Assert\EqualTo(propertyPath="newPassword",message="les mots de passe ne sont pas identique")
     */
    private $confirmPassword;


    public function getOldPassword() : ? string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword) : self
    {
        $this->oldPassword = $oldPassword;

        return $this;
    }

    public function getNewPassword() : ? string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword) : self
    {
        $this->newPassword = $newPassword;

        return $this;
    }

    public function getConfirmPassword() : ? string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword) : self
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }
}
