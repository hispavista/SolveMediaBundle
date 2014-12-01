<?php

namespace Hispavista\SolveMediaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Hispavista\SolveMediaBundle\DependencyInjection\Compiler\FormPass;

class HispavistaSolveMediaBundle extends Bundle {

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container) {
        parent::build($container);
        $container->addCompilerPass(new FormPass());
    }

}
