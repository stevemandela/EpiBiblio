<?php

namespace EPI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EPI\UserBundle\Entity\status;
use EPI\UserBundle\Form\statusType;
class statusController extends Controller
{
    
   public function afficherStatusAction()
    {
        return $this->render('EPIUserBundle:Status:afficheStatus.html.twig', array(
            // ...
        ));
    }

   
    public function publierStatusAction(Request $requette)
    {
        $status = new Status();
        $form = $this->createForm(statusType::class, $status);
        $form->handleRequest($requette);
       if ($form->isSubmitted() && $form->isValid()) {
        $moi = $this->getUser();
        $status->setUser($moi);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($status);
            $entityManager->flush();

            return $this->redirectToRoute('status_publier', [
                
            ]);
        }
        return $this->render('EPIUserBundle:Status:publierStatus.html.twig',
            array(
                'form'=>$form->createView()
                )
            );
    } 
    
       
       /* $status->setPublications('publications');
        $status->setDateStatus('dateStatus');
        $status->setTempsStatus('tempsStatus');
       // $status->setCommentaires('commentaires');




        $em->persist($status);
        $em->flush();
        
        return $this->render('EPIUserBundle:status:publierStatus.html.twig',array('id' => $status->getId()));*/


       
      //  return new Response($contenu);

    //}

}
