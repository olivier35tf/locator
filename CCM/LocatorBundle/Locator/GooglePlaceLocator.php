<?php
/**
 * Created by PhpStorm.
 * User: olivierpot
 * Date: 04/02/15
 * Time: 10:38
 */

namespace CCM\LocatorBundle\Locator;


class GooglePlaceLocator implements LocatorInterface {

    private $key;


    /**
     * @param string $key The Google API
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param string $query
     * @return array
     */
    public function searchByKeyword($query)
    {
        // TODO: Implement searchByKeyword() method.
        $urlEncodedQuery = urlencode($query);
        $url = sprintf('https://maps.googleapis.com/maps/api/place/textsearch/json?query=%s&key=%s',$urlEncodedQuery,$this->key);


        $result = json_decode(file_get_contents($url),true);


        return array_map(function($result){
            return [
                'name' => $result['name']
                ,'adresse' => $result['formatted_address']
                ,'source' => 'Google'
            ];
        },$result['results']);



    }


}