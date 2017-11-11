<?php

namespace Fairlane\CookieConsentBundle\DependencyInjection;

use Fairlane\CookieConsentBundle\Type\Constant;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root(Constant::BUNDLE_CONFIG_ROOT);

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->booleanNode(Constant::BUNDLE_CONFIG_BOOTSTRAP)->end()
                ->booleanNode(Constant::BUNDLE_CONFIG_ACTIVE)->end()
                ->booleanNode(Constant::BUNDLE_CONFIG_TRANSLATE)->end()
                ->booleanNode(Constant::BUNDLE_CONFIG_JQUERY)->end()
                ->integerNode(Constant::BUNDLE_CONFIG_COOKIE_LIFETIME)->end()
                ->arrayNode(Constant::BUNDLE_CONFIG_TWIG)
                    ->children()
                        ->scalarNode(Constant::BUNDLE_CONFIG_TEXT_INFO)->end()
                        ->scalarNode(Constant::BUNDLE_CONFIG_TEXT_INFO_LINK)->end()
                        ->scalarNode(Constant::BUNDLE_CONFIG_TEXT_ACCEPT_BUTTON)->end()
                        ->scalarNode(Constant::BUNDLE_CONFIG_URL_ADDITIONAL_INFO)->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
