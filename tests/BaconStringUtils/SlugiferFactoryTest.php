<?php
/**
 * BaconStringUtils
 *
 * @link      http://github.com/Bacon/BaconStringUtils For the canonical source repository
 * @copyright 2011-2014 Ben Scholzen 'DASPRiD'
 * @license   http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace BaconStringUtils;

use Interop\Container\ContainerInterface;
use PHPUnit_Framework_TestCase as TestCase;

class SlugiferFactoryTest extends TestCase
{
    /**
     * @var SlugifierFactory
     */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new SlugifierFactory();
    }

    public function testFactoryImplementsInterface()
    {
        $this->assertInstanceOf('Zend\ServiceManager\Factory\FactoryInterface', $this->factory);
    }

    public function testReturnsSlugifierAndUniDecoder()
    {
        $container = $this->getContainer();
        $slugifier = $this->factory->__invoke($container, 'slug');

        $this->assertInstanceOf('BaconStringUtils\Slugifier', $slugifier);
        $this->assertInstanceOf('BaconStringUtils\UniDecoder', $slugifier->getUniDecoder());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|ContainerInterface
     */
    protected function getContainer()
    {
        $decoderMock = $this->getMock('BaconStringUtils\UniDecoder');
        $container = $this->getMock('\Interop\Container\ContainerInterface');
        $container->expects($this->any())
                ->method('get')
                ->with('BaconStringUtils\UniDecoder')
                ->will($this->returnValue($decoderMock));

        return $container;
    }
}
