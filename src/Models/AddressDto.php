<?php 
/*
 * Api2PostnordComLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 06/29/2016
 */

namespace Api2PostnordComLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class AddressDto implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @var string|null $addressType public property
     */
    public $addressType;

    /**
     * @todo Write general description for this property
     * @var string|null $city public property
     */
    public $city;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $countryCode public property
     */
    public $countryCode;

    /**
     * @todo Write general description for this property
     * @var string|null $postalCode public property
     */
    public $postalCode;

    /**
     * @todo Write general description for this property
     * @var string|null $streetName public property
     */
    public $streetName;

    /**
     * @todo Write general description for this property
     * @var string|null $streetNumber public property
     */
    public $streetNumber;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string|null       $addressType    Initialization value for the property $this->addressType 
     * @param   string|null       $city           Initialization value for the property $this->city        
     * @param   string            $countryCode    Initialization value for the property $this->countryCode 
     * @param   string|null       $postalCode     Initialization value for the property $this->postalCode  
     * @param   string|null       $streetName     Initialization value for the property $this->streetName  
     * @param   string|null       $streetNumber   Initialization value for the property $this->streetNumber
     */
    public function __construct()
    {
        if(6 == func_num_args())
        {
            $this->addressType  = func_get_arg(0);
            $this->city         = func_get_arg(1);
            $this->countryCode  = func_get_arg(2);
            $this->postalCode   = func_get_arg(3);
            $this->streetName   = func_get_arg(4);
            $this->streetNumber = func_get_arg(5);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['addressType']  = $this->addressType;
        $json['city']         = $this->city;
        $json['countryCode']  = $this->countryCode;
        $json['postalCode']   = $this->postalCode;
        $json['streetName']   = $this->streetName;
        $json['streetNumber'] = $this->streetNumber;

        return $json;
    }
}