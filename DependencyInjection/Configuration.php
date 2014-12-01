<?php

namespace Hispavista\SolveMediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hispavista_solve_media');

        $this->addCaptcha($rootNode);

        return $treeBuilder;
    }

    /**
     * Add Configuration Captcha
     *
     * @param ArrayNodeDefinition $rootNode
     */
    private function addCaptcha(ArrayNodeDefinition $rootNode) {
        $rootNode->children()
            ->scalarNode('challenge_key')->isRequired()->end()
            ->scalarNode('verification_key')->isRequired()->end()
            ->scalarNode('autenticathion_key')->isRequired()->end()
        ->end();
    }

}
