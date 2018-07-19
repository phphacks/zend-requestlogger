<?php

namespace Zend\RequestLogger;

use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

/**
 * Module
 *
 * @package Zend\RequestLogger
 */
class Module
{
    /**
     * @param MvcEvent $event
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function onBootstrap(MvcEvent $event)
    {
        /** @var ServiceManager $serviceLocator */
        $serviceLocator = $event->getApplication()->getServiceManager();

        /** @var Request $request */
        $request = $event->getRequest();

        if($serviceLocator->has(LoggerInterface::class)) {
            /** @var LoggerInterface $logger */
            $logger = $serviceLocator->get(LoggerInterface::class);
            $logger->log($request);
        }
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}