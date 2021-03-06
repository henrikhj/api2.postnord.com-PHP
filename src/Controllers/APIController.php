<?php
/*
 * Api2PostnordComLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 06/29/2016
 */

namespace Api2PostnordComLib\Controllers;

use Api2PostnordComLib\APIException;
use Api2PostnordComLib\APIHelper;
use Api2PostnordComLib\Configuration;
use Api2PostnordComLib\Models;
use Api2PostnordComLib\Http\HttpRequest;
use Api2PostnordComLib\Http\HttpResponse;
use Api2PostnordComLib\Http\HttpMethod;
use Api2PostnordComLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class APIController extends BaseController {

    /**
     * @var APIController The reference to *Singleton* instance of this class
     */
    private static $instance;
    
    /**
     * Returns the *Singleton* instance of this class.
     * @return APIController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * getServicePointInformation provides service point information for the Nordic countries (SE, NO, FI and DK)
     * @param  string          $apikey                 Required parameter: The unique consumer (client) identifier 32 characters
     * @param  string          $returntype             Required parameter: Response Content-Type
     * @param  string|null     $countryCode            Optional parameter: Country code in ISO 3166-1. Allowed values are SE, NO, FI and DK. Several countries can be selected via an comma separated list, i.e SE,DK. If left empty the response contains all available countries service point information
     * @param  string|null     $locale                 Optional parameter: Default is en. Allowed values are en, sv, no, da and fi
     * @param  string|null     $requestDropOffTime     Optional parameter: Default is false. Allowed values are false and true. Defines if drop-off hours are to be included in the answer or not. Note that drop-off times are currently only accurate for Sweden
     * @param  string|null     $servicePointId         Optional parameter: Service point Id's. Several Id's can be selected via an comma separated list, i.e 10000,10001,10028. One and only one country code must be given when this parameter is supplied
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getServicePointInformation (
                $apikey,
                $returntype,
                $countryCode = 'SE',
                $locale = 'en',
                $requestDropOffTime = NULL,
                $servicePointId = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/businesslocation/v1/servicepoint/getServicePointInformation.{returntype}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'returntype'         => $returntype,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'apikey'             => $apikey,
            'countryCode'        => (null != $countryCode) ? $countryCode : 'SE',
            'locale'             => (null != $locale) ? $locale : 'en',
            'requestDropOffTime' => $requestDropOffTime,
            'servicePointId'     => $servicePointId,
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => 'APIMATIC 2.0',
            'Accept'           => 'application/json'
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('The server did not understand or could not validate the input parameters. More information about the cause of the error is available in the compositeFault object.', 400, $response->body);
        }

        else if ($response->code == 500) {
            throw new APIException('The server experienced a runtime exception while processing the request. Try again later or contact customer support.', 500, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\ResponseDto());
    }
        

}