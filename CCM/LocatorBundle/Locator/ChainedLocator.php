<?php
/**
 * Created by PhpStorm.
 * User: olivierpot
 * Date: 04/02/15
 * Time: 11:21
 */

namespace CCM\LocatorBundle\Locator;


class ChainedLocator implements LocatorInterface
{

    private $locators;


    public function addLocator(LocatorInterface $locator)
    {
        $this->locators[] = $locator;
    }


    /**
     * @param string $query
     * @return array
     */
    public function searchByKeyword($query)
    {
        $results = array();
        foreach($this->locators as $locator)
        {
            $results = array_merge(
                $results
                ,$locator->searchByKeyword($query)
            );
        }

        return $results;
    }


}