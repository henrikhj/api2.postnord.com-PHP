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
class CustomerSupportDto implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @var string|null $country public property
     */
    public $country;

    /**
     * @todo Write general description for this property
     * @var string|null $customerSupportPhoneNo public property
     */
    public $customerSupportPhoneNo;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string|null       $country                  Initialization value for the property $this->country               
     * @param   string|null       $customerSupportPhoneNo   Initialization value for the property $this->customerSupportPhoneNo
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->country                = func_get_arg(0);
            $this->customerSupportPhoneNo = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['country']                = $this->country;
        $json['customerSupportPhoneNo'] = $this->customerSupportPhoneNo;

        return $json;
    }
}