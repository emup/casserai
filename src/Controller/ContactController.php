<?php

namespace App\Controller;

use App\Form\ContactType;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $message = (new Swift_Message('Hello Email'))
                ->setFrom($data['email'])
                ->setTo('salohe8045@chordmi.com')
                ->setBody(
                    $this->renderView(
                        'contact/thanks.html.twig',
                        $data
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);

            return $this->redirectToRoute('contact_thanks');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name'=> 'ContactController',
            'our_form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/contact/thanks", name="contact_thanks")
     */
    public function thanks() {
        return $this->render('contact/thanks.html.twig');
    }
}