<?php
namespace Fairlane\CookieConsentBundle\Service;

use Fairlane\CookieConsentBundle\Type\Constant;

/**
 * Class TwigService
 *
 * @package Auxilia\CoreBundle\Service
 */
class TwigService
{
    /**
     * Contains the injected configuration
     *
     * @var array
     */
    private $config;

    /**
     * TwigService constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getTwig()
    {
       return $this->config['twig'];
    }

    /**
     * @return boolean
     */
    public function getUseBootstrap()
    {
       return $this->config[Constant::BUNDLE_CONFIG_BOOTSTRAP];
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
       return $this->config[Constant::BUNDLE_CONFIG_ACTIVE];
    }

    /**
     * @return boolean
     */
    public function getTranslate()
    {
       return $this->config[Constant::BUNDLE_CONFIG_TRANSLATE];
    }

    /**
     * @return boolean
     */
    public function getUseJquery()
    {
       return $this->config[Constant::BUNDLE_CONFIG_JQUERY];
    }
}