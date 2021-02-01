<?php

namespace App\Controller;

use App\Entity\ValidationEpreuve;
use App\Form\ValidationEpreuveType;
use App\Repository\ValidationEpreuveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/validation/epreuve")
 */
class ValidationEpreuveController extends AbstractController
{
    /**
     * @Route("/", name="validation_epreuve_index", methods={"GET"})
     */
    public function index(ValidationEpreuveRepository $validationEpreuveRepository): Response
    {
        return $this->render('validation_epreuve/index.html.twig', [
            'validation_epreuves' => $validationEpreuveRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="validation_epreuve_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $validationEpreuve = new ValidationEpreuve();
        $form = $this->createForm(ValidationEpreuveType::class, $validationEpreuve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($validationEpreuve);
            $entityManager->flush();

            return $this->redirectToRoute('validation_epreuve_index');
        }

        return $this->render('validation_epreuve/new.html.twig', [
            'validation_epreuve' => $validationEpreuve,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="validation_epreuve_show", methods={"GET"})
     */
    public function show(ValidationEpreuve $validationEpreuve): Response
    {
        return $this->render('validation_epreuve/show.html.twig', [
            'validation_epreuve' => $validationEpreuve,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="validation_epreuve_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ValidationEpreuve $validationEpreuve): Response
    {
        $form = $this->createForm(ValidationEpreuveType::class, $validationEpreuve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('validation_epreuve_index');
        }

        return $this->render('validation_epreuve/edit.html.twig', [
            'validation_epreuve' => $validationEpreuve,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="validation_epreuve_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ValidationEpreuve $validationEpreuve): Response
    {
        if ($this->isCsrfTokenValid('delete'.$validationEpreuve->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($validationEpreuve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('validation_epreuve_index');
    }
}
