<?php

namespace App\Controller;

use App\Entity\Armee;
use App\Form\ArmeeType;
use App\Repository\ArmeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/armee")
 */
class ArmeeController extends AbstractController
{
    /**
     * @Route("/", name="armee_index", methods={"GET"})
     */
    public function index(ArmeeRepository $armeeRepository): Response
    {
        return $this->render('armee/index.html.twig', [
            'armees' => $armeeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="armee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $armee = new Armee();
        $form = $this->createForm(ArmeeType::class, $armee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($armee);
            $entityManager->flush();

            return $this->redirectToRoute('armee_index');
        }

        return $this->render('armee/new.html.twig', [
            'armee' => $armee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="armee_show", methods={"GET"})
     */
    public function show(Armee $armee): Response
    {
        return $this->render('armee/show.html.twig', [
            'armee' => $armee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="armee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Armee $armee): Response
    {
        $form = $this->createForm(ArmeeType::class, $armee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('armee_index');
        }

        return $this->render('armee/edit.html.twig', [
            'armee' => $armee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="armee_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Armee $armee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$armee->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($armee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('armee_index');
    }
}
