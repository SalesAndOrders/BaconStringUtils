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
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SlugifyFactory
 * @package BaconStringUtils\Filter
 */
class SlugifyFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $locator
     * @param string $requestedName
     * @param array|null $options
     * @return Slugify|object
     */
    public function __invoke(ContainerInterface $locator, $requestedName, array $options = null)
    {
        $slugifier = $locator->get('BaconStringUtils\Slugifier');
        $slugify   = new Slugify();
        $slugify->setSlugifier($slugifier);

        return $slugify;
    }
}
