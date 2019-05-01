<?php

namespace EPI\UserBundle\Controller;

use EPI\UserBundle\Entity\livres;
use EPI\UserBundle\Entity\commentaires;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EPI\UserBundle\Form\LivresType;
use Symfony\Component\HttpFoundation\File\File;
use EPI\UserBundle\Services\FileUploader;
//use Symfony\Component\HttpFoundation\Image\Image;
use EPI\UserBundle\Services\ImageUploader;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Livre controller.
 *
 */
class livresController extends Controller
{
    /**
     * Lists all livre entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $livres = $em->getRepository('EPIUserBundle:livres')->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $livres,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 6)
            );
        return $this->render('livres/index.html.twig', array(
            'livres' => $result,
        ));
    }

    /**
     * Creates a new livre entity.
     *
     */
    public function newAction(Request $request)
    {
        $livres = new livres();
        $form = $this->createForm('EPI\UserBundle\Form\livresType', $livres);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livres = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($livres);
            $em->flush();

            $fileName = $livres->getBrochure();
            $imageName = $livres->getImage();
            
            $livres->setBrochure($fileName);
            

            $livres->setBrochure(
                 new File($this->getParameter('brochures_directory').'/'.$livres->getBrochure()));

            $livres->setImage($imageName);
            $livres->setImage(
                 new File($this->getParameter('images_directory').'/'.$livres->getImage())
            );



            return $this->redirectToRoute('livres_livres_show', array('id' => $livres->getId()));
        }

        return $this->render('livres/new.html.twig', array(
            'livres' => $livres,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a livre entity.
     *
     */
    public function showAction(livres $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);
         $em= $this->getDoctrine()
                    ->getManager();
                    $commentaire=$em->getRepository('EPIUserBundle:commentaires');

        $listCommentaire=$em->getRepository('EPIUserBundle:commentaires')->findBy(array('livres'=>$livre));

        return $this->render('livres/show.html.twig', array(
            'livre' => $livre,
            'commentaire'=>$commentaire,
            'listCommentaire'=>$listCommentaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing livre entity.
     *
     */
    public function editAction(Request $request, livres $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);
        $editForm = $this->createForm('EPI\UserBundle\Form\livresType', $livre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('livres_livres_edit', array('id' => $livre->getId()));
        }

        return $this->render('livres/edit.html.twig', array(
            'livre' => $livre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a livre entity.
     *
     */
    public function deleteAction(Request $request, livres $livre)
    {
        $form = $this->createDeleteForm($livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livre);
            $em->flush();
        }

        return $this->redirectToRoute('livres_livres_index');
    }

    /**
     * Creates a form to delete a livre entity.
     *
     * @param livres $livre The livre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(livres $livre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livres_livres_delete', array('id' => $livre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Displa
     * @Route("/{id}/commentaire" , name="comment_edit")
     * @Method({"GET", "POST"})
     */

    public function ajoutercommentaireAction(Request $request,$id){
        $commentaire = new commentaires();
        $repository= $this->getDoctrine()
                    ->getManager()
                    ->getRepository('EPIUserBundle:livres');
        $livres= $repository->find($id);
        $commentaire->SetLivres($livres);
        $commentaire->setDateCommentaire(new \DateTime('now'));

         $fb= $this->createFormBuilder($commentaire)
                ->add('commentaire', Textareatype::class)
                ->add('Commentaire', SubmitType::class);

                $form = $fb->getForm();

                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid()){
                    $commentaire->setUser($this->getUser());

                    $commentaire = $form->getData();
                    $em=$this->getDoctrine()->getManager();
                    $em->persist($commentaire);
                    $em->flush();

    return $this->redirectToRoute('livres_livres_show' , array("id"=>$commentaire->getId()));
                }
    return $this->render('EPIUserBundle:Commentaires:publierCommentaire.html.twig' , array('form'=>$form->createView()));

    }

    /**
     * @return string
    */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
