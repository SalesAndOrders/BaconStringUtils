<?php
/**
 * BaconStringUtils
 *
 * @link      http://github.com/Bacon/BaconStringUtils For the canonical source repository
 * @copyright 2011-2014 Ben Scholzen 'DASPRiD'
 * @license   http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace BaconStringUtils;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SlugifierFactory
 * @package BaconStringUtils
 */
class SlugifierFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Slugifier|object
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $decoder   = $serviceLocator->get('BaconStringUtils\UniDecoder');
        $slugifier = new Slugifier();
        $slugifier->setUniDecoder($decoder);

        return $slugifier;
    }
}
