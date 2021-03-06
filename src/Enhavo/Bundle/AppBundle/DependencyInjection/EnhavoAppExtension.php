<?php

namespace Enhavo\Bundle\AppBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class EnhavoAppExtension extends Extension
{
    /**
     * Enhavo Version
     */
    const VERSION = '0.4.0';

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $container->setParameter('enhavo_app.stylesheets', $config[ 'stylesheets' ]);
        $container->setParameter('enhavo_app.javascripts', $config[ 'javascripts' ]);
        $container->setParameter('enhavo_app.apps', $config[ 'apps' ]);
        $container->setParameter('enhavo_app.menu', $config[ 'menu' ]);
        $container->setParameter('enhavo_app.show_version', $config[ 'show_version' ]);
        $container->setParameter('enhavo_app.show_branding', $config[ 'show_branding' ]);
        $container->setParameter('enhavo_app.logo_path', $config['logo_path']);
        $container->setParameter('enhavo_app.login_redirect', $config[ 'login_redirect' ]);
        $container->setParameter('enhavo_app.template', $config[ 'template' ]);
        $container->setParameter('enhavo_app.route.url_resolver', $config['route']['url_resolver']);
        $container->setParameter('enhavo_app.route.auto_generator', $config['route']['auto_generator']);
        $container->setParameter('enhavo_app.roles', $config['roles']);
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services/services.yml');
        $loader->load('services/twig.yml');
        $loader->load('services/viewer.yml');
        $loader->load('services/block.yml');
        $loader->load('services/button.yml');
        $loader->load('services/filter.yml');
        $loader->load('services/routing.yml');
        $loader->load('services/form.yml');
        $loader->load('services/table.yml');
        $loader->load('services/action.yml');
        $loader->load('services/batch.yml');
        $loader->load('services/menu.yml');
        $loader->load('services/chart.yml');
    }
}
