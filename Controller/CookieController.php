<?php

namespace Fairlane\CookieConsentBundle\Controller;

use Fairlane\CookieConsentBundle\Type\Constant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CookieController extends Controller
{
    public function acceptAction()
    {
        $request = Request::createFromGlobals();
        $content = json_decode($request->getContent(), true);
        if (isset($content['cookie-consent']) && $content['cookie-consent'] == 'ok') {
            $expires = new \DateTime("now");
            $dateInterval = new \DateInterval(
                sprintf(
                    'P%dD',
                    $this->getFairlaneParameter(Constant::BUNDLE_CONFIG_COOKIE_LIFETIME)
                )
            );
            $expires->add($dateInterval);
            $cookie = new Cookie(Constant::BUNDLE_COOKIE_NAME,'ok', $expires);
            $jsonResponse = new JsonResponse(['success' => true]);
            $jsonResponse->headers->setCookie($cookie);

            return $jsonResponse;
        } else {

            return new JsonResponse(['success' => false], 400);
        }
    }

    protected function getFairlaneParameter($key)
    {
        $params = $this->getParameter('fairlane_cookie_consent');
        if (!empty($params[$key])) {
            return $params[$key];
        } else {
            return null;
        }
    }
}
