<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\ActualityType;
use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/actualites")
 */
class ActualityController extends AbstractController
{
    /**
     * @Route("", name="actuality_index", methods={"GET"})
     * @param ActualityRepository $actualityRepository
     * @return Response
     */
    public function index(ActualityRepository $actualityRepository): Response
    {
        return $this->render('actuality/index.html.twig', [
            'actualities' => $actualityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="actuality_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $actuality = new Actuality();
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actuality);
            $entityManager->flush();
            // do some sort of processing
            $this->addFlash(
                'success',
                'Votre article à bien été enregistré !'
            );

            return $this->redirectToRoute('actuality_index');
        }

        return $this->render('actuality/new.html.twig', [
            'actuality' => $actuality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="actuality_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Actuality $actuality
     * @return Response
     */
    public function edit(Request $request, Actuality $actuality): Response
    {
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            // do some sort of processing
            $this->addFlash(
                'success',
                'Votre article à bien été modifié !'
            );

            return $this->redirectToRoute('actuality_index');
        }

        return $this->render('actuality/edit.html.twig', [
            'actuality' => $actuality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actuality_delete", methods={"DELETE"})
     * @param Request $request
     * @param Actuality $actuality
     * @return Response
     */
    public function delete(Request $request, Actuality $actuality): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actuality->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($actuality);
            $entityManager->flush();

            // do some sort of processing
            $this->addFlash(
                'danger',
                'Votre article à bien été supprimé !'
            );
        }

        return $this->redirectToRoute('actuality_index');
    }
}
