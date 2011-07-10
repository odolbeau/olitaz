<?php

namespace Olitaz\HomeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    /**
     * @Assert\NotBlank(
     *     message = "Renseignez votre nom."
     * )
     * @Assert\MinLength(
     *     limit = 3,
     *     message = "Nom trop court!"
     * )
     */
    protected $name;
    /**
     * @Assert\NotBlank(
     *     message = "Renseignez votre adresse mail."
     * )
     * @Assert\Email(
     *     message = "Adresse email incorrecte."
     * )
     */
    protected $mail;
    /**
     * @Assert\NotBlank(
     *     message = "Quel-est le sujet de votre message?"
     * )
     * @Assert\MinLength(
     *     limit = 3,
     *     message = "Renseignez un sujet plus explicite!"
     * )
     */
    protected $subject;
    /**
     * @Assert\NotBlank(
     *     message = "Spécifiez votre demande."
     * )
     * @Assert\MinLength(
     *     limit = 20,
     *     message = "C'est tout ce que vous avez à dire? Un petit effort! :)"
     * )
     */
    protected $content;


    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getMail() {
        return $this->mail;
    }
    public function setMail($mail) {
        $this->mail = $mail;
    }
    public function getSubject() {
        return $this->subject;
    }
    public function setSubject($subject) {
        $this->subject = $subject;
    }
    public function getContent() {
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
    }
}
