<?php
/**
 * Platinum Pixs
 *
 * @copyright  Copyright (c) 2010-2013, Platinum Pixs, LLC All rights reserved.
 * @link       http://www.platinumpixs.com
 */

namespace Webfactory\Bundle\AwsSdk2Bundle\Tests\DependencyInjection;

use Guzzle\Service\Builder\ServiceBuilder;
use Webfactory\Bundle\AwsSdk2Bundle\DependencyInjection\WebfactoryAwsSdk2Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @copyright  Copyright (c) 2010-2013, Platinum Pixs, LLC All rights reserved.
 * @link       http://www.platinumpixs.com
 */
class WebfactoryAwsSdk2ExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private $container;

    /**
     * @var WebfactoryAwsSdk2Extension
     */
    private $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new WebfactoryAwsSdk2Extension();
    }

    public function testTaggedService()
    {
        $config = array(
            'standard' => array(
                'region' => '<region name>'
            )
        );
        $this->extension->load(array(), $this->container);
        $this->extension->load(array($config), $this->container);

        $this->assertEquals(2, count($this->container->findTaggedServiceIds('webfactory_aws_sdk2')));
    }

    public function testDefaultSetup()
    {
        $this->extension->load(array(), $this->container);

        $this->assertInstanceOf(ServiceBuilder::class, $this->container->get('webfactory_aws_sdk2.default'));
    }


    public function testBaseSetup()
    {
        $config = array(
            'standard' => array(
                'key'    => '<aws access key>',
                'secret' => '<aws secret key>',
                'region' => '<region name>'
            )
        );

        $this->extension->load(array($config), $this->container);

        $this->assertInstanceOf(ServiceBuilder::class, $this->container->get('webfactory_aws_sdk2.standard'));
    }


    public function testBaseSetupWithKeyandSecret()
    {
        $config = array(
            'standard' => array(
                'region' => '<region name>'
            )
        );

        $this->extension->load(array($config), $this->container);

        $this->assertInstanceOf(ServiceBuilder::class, $this->container->get('webfactory_aws_sdk2.standard'));
    }

}
