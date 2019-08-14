<?php
/**
 * BaconStringUtils
 *
 * @link      http://github.com/Bacon/BaconStringUtils For the canonical source repository
 * @copyright 2011-2014 Ben Scholzen 'DASPRiD'
 * @license   http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace BaconStringUtils\Filter;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SlugifyFactory
 * @package BaconStringUtils\Filter
 */
class SlugifyFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Slugify|mixed
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $slugifier = $serviceLocator->getServiceLocator()->get('BaconStringUtils\Slugifier');
        $slugify   = new Slugify();
        $slugify->setSlugifier($slugifier);

        return $slugify;
    }
}
