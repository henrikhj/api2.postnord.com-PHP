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
class ResponseDto implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var ServicePointInformationResponse $servicePointInformationResponse public property
     */
    public $servicePointInformationResponse;

    /**
     * Constructor to set initial or default values of member properties
     * @param   ServicePointInformationResponse   $servicePointInformationResponse   Initialization value for the property $this->servicePointInformationResponse
     */
    public function __construct()
    {
        if(1 == func_num_args())
        {
            $this->servicePointInformationResponse = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['servicePointInformationResponse'] = $this->servicePointInformationResponse;

        return $json;
    }
}