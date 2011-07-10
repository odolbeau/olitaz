<?php

namespace Olitaz\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Olitaz\HomeBundle\Entity\Contact;
use Olitaz\HomeBundle\Form\ContactType;


class ContactController extends Controller
{

    public function indexAction()
    {
        $contact = new Contact();

        $form = $this->createForm(new ContactType(), $contact);

        return $this->render('OlitazHomeBundle:Contact:index.html.twig', array(
                    'form' => $form->createView(),
                    ));
    }

    public function createAction()
    {
        $contact = new Contact();

        $form = $this->createForm(new ContactType(), $contact);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($contact->getSubject())
                    ->setFrom(array($contact->getMail() => $contact->getName()))
                    ->setTo($this->container->getParameter('admin_mail'))
                    ->setBody($contact->getContent())
                    ;
                $this->get('mailer')->send($message);
                return $this->redirect($this->generateUrl('OlitazHomeBundle_contacted'));
            } else {
                return $this->render('OlitazHomeBundle:Contact:index.html.twig', array(
                            'form' => $form->createView(),
                            ));
            }
        }
    }

    public function contactedAction()
    {
        return $this->render('OlitazHomeBundle:Contact:contacted.html.twig');
    }
}
