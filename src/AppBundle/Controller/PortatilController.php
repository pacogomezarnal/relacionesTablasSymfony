<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Portatil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Portatil controller.
 *
 * @Route("portatil")
 */
class PortatilController extends Controller
{
    /**
     * Lists all portatil entities.
     *
     * @Route("/", name="portatil_index",methods={"GET"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $portatils = $em->getRepository('AppBundle:Portatil')->findAll();

        return $this->render('portatil/index.html.twig', array(
            'portatils' => $portatils,
        ));
    }

    /**
     * Creates a new portatil entity.
     *
     * @Route("/new", name="portatil_new",methods={"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $portatil = new Portatil();
        $form = $this->createForm('AppBundle\Form\PortatilType', $portatil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($portatil);
            $em->flush();

            return $this->redirectToRoute('portatil_show', array('id' => $portatil->getId()));
        }

        return $this->render('portatil/new.html.twig', array(
            'portatil' => $portatil,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a portatil entity.
     *
     * @Route("/{id}", name="portatil_show",methods={"GET"})
     */
    public function showAction(Portatil $portatil)
    {
        $deleteForm = $this->createDeleteForm($portatil);

        return $this->render('portatil/show.html.twig', array(
            'portatil' => $portatil,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing portatil entity.
     *
     * @Route("/{id}/edit", name="portatil_edit",methods={"GET", "POST"})
     */
    public function editAction(Request $request, Portatil $portatil)
    {
        $deleteForm = $this->createDeleteForm($portatil);
        $editForm = $this->createForm('AppBundle\Form\PortatilType', $portatil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('portatil_edit', array('id' => $portatil->getId()));
        }

        return $this->render('portatil/edit.html.twig', array(
            'portatil' => $portatil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a portatil entity.
     *
     * @Route("/{id}", name="portatil_delete",methods={"DELETE"})
     */
    public function deleteAction(Request $request, Portatil $portatil)
    {
        $form = $this->createDeleteForm($portatil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($portatil);
            $em->flush();
        }

        return $this->redirectToRoute('portatil_index');
    }

    /**
     * Creates a form to delete a portatil entity.
     *
     * @param Portatil $portatil The portatil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Portatil $portatil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('portatil_delete', array('id' => $portatil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
