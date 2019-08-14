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
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SlugifierFactory
 * @package BaconStringUtils
 */
class SlugifierFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $locator
     * @param string $requestedName
     * @param array|null $options
     * @return Slugifier|object
     */
    public function __invoke(ContainerInterface $locator, $requestedName, array $options = null)
    {
        $decoder   = $locator->get('BaconStringUtils\UniDecoder');
        $slugifier = new Slugifier();
        $slugifier->setUniDecoder($decoder);

        return $slugifier;
    }
}
