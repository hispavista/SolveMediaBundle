<?php

namespace Hispavista\SolveMediaBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Add a new twig.form.resources
 *
 * @author rubenma
 */
class FormPass  implements CompilerPassInterface{

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container) {
        $resources = $container->getParameter('twig.form.resources');
        $resources[] = 'HispavistaSolveMediaBundle:Form:fields.html.twig';
        $container->setParameter('twig.form.resources', $resources);
    }

}
