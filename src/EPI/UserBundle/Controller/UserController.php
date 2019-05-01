<?php

namespace EPI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function userAction()
    {
        return $this->render('EPIUserBundle:User:user.html.twig');
    }
}
