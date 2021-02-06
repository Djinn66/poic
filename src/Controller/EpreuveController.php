<?php

namespace App\Controller;

use App\Entity\Bareme;
use App\Entity\Epreuve;
use App\Form\BaremeType;
use App\Form\EpreuveType;
use App\Repository\EpreuveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/epreuve")
 */
class EpreuveController extends AbstractController
{
    /**
     * @Route("/", name="epreuve_index", methods={"GET"})
     * @param EpreuveRepository $epreuveRepository
     * @return Response
     */
    public function index(EpreuveRepository $epreuveRepository): Response
    {
        return $this->render('epreuve/index.html.twig', [
            'epreuves' => $epreuveRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="epreuve_edit", methods={"GET","POST"})
     * @Route("/new", name="epreuve_new", methods={"GET","POST"})
     * @param Request $request
     * @param Epreuve|null $epreuve
     * @return Response
     */
    public function form(Request $request, Epreuve $epreuve = null): Response
    {
        if(!$epreuve){
            $epreuve = new Epreuve();
        }


        $form_epreuve = $this->createForm(EpreuveType::class, $epreuve);

        $form_epreuve->handleRequest($request);

        if ($form_epreuve->isSubmitted() && $form_epreuve->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($epreuve);
            $entityManager->flush();
            return $this->redirectToRoute('epreuve_edit',['id'=>$epreuve->getId()]);

        }

        $bareme = new Bareme();
        $error = "";
        $form_bareme = $this->createForm(BaremeType::class, $bareme);

        $form_bareme->handleRequest($request);

        if ($form_bareme->isSubmitted() && $form_bareme->isValid()) {
            if($epreuve->getId()!= null){
                $bareme->setEpreuve($epreuve);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($bareme);
                $entityManager->flush();

            }
            else $error = "erreur";
        }

        return $this->render('epreuve/form.html.twig', [
            'epreuve' => $epreuve,
            'form' => $form_epreuve->createView(),
            'formBareme' => $form_bareme->createView(),
            'erreur' => $error,
            'editMode'=> $epreuve->getId() !== null,
        ]);
    }

    /**
     * @Route("/{id}", name="epreuve_show", methods={"GET"})
     * @param Epreuve $epreuve
     * @return Response
     */
    public function show(Epreuve $epreuve): Response
    {
        return $this->render('epreuve/show.html.twig', [
            'epreuve' => $epreuve,
        ]);
    }

    /**
     * @Route("/{id}", name="epreuve_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Epreuve $epreuve): Response
    {
        if ($this->isCsrfTokenValid('delete'.$epreuve->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($epreuve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('epreuve_index');
    }
}
