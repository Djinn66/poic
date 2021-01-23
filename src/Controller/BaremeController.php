<?php

namespace App\Controller;

use App\Entity\Bareme;
use App\Form\BaremeType;
use App\Repository\BaremeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bareme")
 */
class BaremeController extends AbstractController
{
    /**
     * @Route("/", name="bareme_index", methods={"GET"})
     */
    public function index(BaremeRepository $baremeRepository): Response
    {
        return $this->render('bareme/index.html.twig', [
            'baremes' => $baremeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bareme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bareme = new Bareme();
        $form = $this->createForm(BaremeType::class, $bareme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bareme);
            $entityManager->flush();

            return $this->redirectToRoute('bareme_index');
        }

        return $this->render('bareme/new.html.twig', [
            'bareme' => $bareme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bareme_show", methods={"GET"})
     */
    public function show(Bareme $bareme): Response
    {
        return $this->render('bareme/show.html.twig', [
            'bareme' => $bareme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bareme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bareme $bareme): Response
    {
        $form = $this->createForm(BaremeType::class, $bareme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bareme_index');
        }

        return $this->render('bareme/edit.html.twig', [
            'bareme' => $bareme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bareme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bareme $bareme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bareme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bareme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bareme_index');
    }
}
