<?php
/**
 * Created by PhpStorm.
 * User: olivierpot
 * Date: 04/02/15
 * Time: 10:28
 */

namespace CCM\LocatorBundle\Locator;

/**
 * Interface LocatorInterface
 * @package CCM\LocatorBundle\Locator
 */
interface LocatorInterface
{
    /**
     * @param string $query
     * @return array
     */
    public function searchByKeyword($query);

}