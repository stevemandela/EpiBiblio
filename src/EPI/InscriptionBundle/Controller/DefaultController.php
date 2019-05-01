<?php

namespace EPI\InscriptionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EPIInscriptionBundle:Default:index.html.twig');
    }
}
