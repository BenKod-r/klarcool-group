<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ContactEmail
{
    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Votre prénom doit avoir plus de deux caractères",
     * )
     * @Assert\Type("string")
     * @Assert\NotBlank(message ="Le champ doit être obligatoirement rempli")
     */
    private $name;

    /**
     * @Assert\Type("string")
     * @Assert\Email(
     *      message = "L'adresse mail n'est une adresse valide")
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 100,
     *      minMessage = "Votre sujet doit avoir plus de un caractère",
     * )
     * @Assert\Type("string")
     * @Assert\NotBlank(message = "Le champ doit être obligatoirement rempli")
     */
    private $subject;

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 1500,
     *      maxMessage = "Le champ ne doit pas dépasser 1500 caractères")
     * @Assert\NotBlank(message = "Le champ doit obligatoirement être rempli")
     */
    private $message;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @param string $name
     * @return ContactEmail
     */
    public function setName(string $name): ContactEmail
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return ContactEmail
     */
    public function setEmail(string $email): ContactEmail
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return ContactEmail
     */
    public function setSubject(string $subject): ContactEmail
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * @param string $message
     * @return ContactEmail
     */
    public function setMessage(string $message): ContactEmail
    {
        $this->message = $message;
        return $this;
    }
}