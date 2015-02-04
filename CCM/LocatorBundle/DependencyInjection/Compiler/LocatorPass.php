<?php
/**
 * Created by PhpStorm.
 * User: olivierpot
 * Date: 04/02/15
 * Time: 11:30
 */

namespace CCM\LocatorBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class LocatorPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {

        /*
         * @param Definition
         */
        $chainedLocatorDefinition = $container->findDefinition('ccm_locator.chained_locator');


        $locators = $container->findTaggedServiceIds('locator');
        foreach($locators as $id => $locator)
        {

            $chainedLocatorDefinition->addMethodCall('addLocator',array(new Reference($id)));
        }
    }

}