<?php

namespace EPI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function adminAction()
    {
        return $this->render('EPIUserBundle:Admin:admin.html.twig');
    }
}
