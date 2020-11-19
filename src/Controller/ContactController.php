<?php
/**
 * Created by IntelliJ IDEA.
 * User: Benharrat Khaled.
 * Date: 22/09/2020.
 * Time: 17:30
 */
namespace App\Controller;

use App\Form\ContactType;
use App\Model\ContactEmail;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController {

    /**
     * @Route("/", name="contact")
     * @param MailerInterface $mailer
     * @param Request $request
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function contact(MailerInterface $mailer, Request $request) :Response
    {
        $contact = new ContactEmail();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new templatedEmail())
                ->from($this->getParameter('mailer_from'))
                ->to($this->getParameter('mailer_to'))
                ->subject("Vous avez reçu un email d'un visiteur !")
                ->html($this->renderView('contact/mail.html.twig', [
                    'contact' => $contact
                ]));

            $mailer->send($email);

            $response = (new Email())
                ->from($this->getParameter('mailer_from_client'))
                ->to($contact->getEmail())
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject($contact->getSubject())
                ->text('Klarcool-Groupe, le fabricant qui s’engage pour vous et avec vous.')
                ->embedFromPath('../public/assets/img/logo/loder.png', 'footer-signature')
                ->html('<p>Bonjour ' . $contact->getName() . ',<br>Merci d\'avoir contacté Klarcool Groupe, nous vous répondrons dans les meilleurs délais.</p>
                    <br><div class="d-flex"><img src="cid:footer-signature" style="width: 200px" alt="Klarcool-logo"><p>Klarcool-Groupe, le fabricant qui s’engage pour vous et avec vous.</p></div>
                    <p>Service administratif/comercial:<br><a href="tel:+33983370894">09 83 37 08 94</a></p><p>Service technique:<br><a  href="tel:+33982585812">09 82 58 58 12</a></p>');

            $mailer->send($response);

            $this->addFlash('success', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais !');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()]);
    }
}
