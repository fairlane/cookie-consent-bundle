<?php

namespace Fairlane\CookieConsentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FairlaneCookieConsentBundle:Default:index.html.twig');
    }
}
