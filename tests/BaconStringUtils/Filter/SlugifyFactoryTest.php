<?php
/**
 * BaconStringUtils
 *
 * @link      http://github.com/Bacon/BaconStringUtils For the canonical source repository
 * @copyright 2011-2014 Ben Scholzen 'DASPRiD'
 * @license   http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace BaconStringUtils\Filter;

use Interop\Container\ContainerInterface;
use PHPUnit_Framework_TestCase as TestCase;

class SlugifyFactoryTest extends TestCase
{
    protected $factory;

    protected function setUp()
    {
        $this->factory = new SlugifyFactory();
    }

    public function testFactoryImplementsInterface()
    {
        $this->assertInstanceOf('Zend\ServiceManager\Factory\FactoryInterface', $this->factory);
    }

    public function testReturnsFilter()
    {
        $container = $this->getContainer();

        $this->assertInstanceOf('BaconStringUtils\Filter\Slugify', $this->factory->__invoke($container, 'slug'));
    }

    public function testReturnsFilterWithSlugifier()
    {
        $container = $this->getContainer();
        $slugify = $this->factory->__invoke($container, 'slug');
        $slugifier = $slugify->getSlugifier();

        $this->assertInstanceOf('BaconStringUtils\Slugifier', $slugifier);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|ContainerInterface
     */
    protected function getContainer()
    {
        $slugifier = $this->getMock('BaconStringUtils\Slugifier');

        $container = $this->getMock('\Interop\Container\ContainerInterface');
        $container->expects($this->any())
                ->method('get')
                ->with('BaconStringUtils\Slugifier')
                ->will($this->returnValue($slugifier));


        $pluginManager = $this->getMock('Zend\Filter\FilterPluginManager');
        $pluginManager->expects($this->any())->method('getServiceLocator')->will($this->returnValue($container));

        return $container;
    }
}
