<?php

namespace App\Controller;

use App\Entity\Inaptitude;
use App\Form\InaptitudeType;
use App\Repository\InaptitudeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/inaptitude")
 */
class InaptitudeController extends AbstractController
{
    /**
     * @Route("/", name="inaptitude_index", methods={"GET"})
     */
    public function index(InaptitudeRepository $inaptitudeRepository): Response
    {
        return $this->render('inaptitude/index.html.twig', [
            'inaptitudes' => $inaptitudeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="inaptitude_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $inaptitude = new Inaptitude();
        $form = $this->createForm(InaptitudeType::class, $inaptitude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($inaptitude);
            $entityManager->flush();

            return $this->redirectToRoute('inaptitude_index');
        }

        return $this->render('inaptitude/new.html.twig', [
            'inaptitude' => $inaptitude,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="inaptitude_show", methods={"GET"})
     */
    public function show(Inaptitude $inaptitude): Response
    {
        return $this->render('inaptitude/show.html.twig', [
            'inaptitude' => $inaptitude,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="inaptitude_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Inaptitude $inaptitude): Response
    {
        $form = $this->createForm(InaptitudeType::class, $inaptitude);
        $form->handleRequest($request);

        $nomfichier = 'justificatif_'.$inaptitude->getPersonnel()->getNom().'_'.hash(sha1,'dguahdhzadk');
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['fichier']->getData();
            $file->move('../../files', $nomfichier);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inaptitude_index');
        }

        return $this->render('inaptitude/edit.html.twig', [
            'inaptitude' => $inaptitude,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="inaptitude_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Inaptitude $inaptitude): Response
    {
        if ($this->isCsrfTokenValid('delete'.$inaptitude->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($inaptitude);
            $entityManager->flush();
        }

        return $this->redirectToRoute('inaptitude_index');
    }
}
