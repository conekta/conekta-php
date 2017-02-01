<?php

namespace Conekta;

use \Conekta\Resource;
use \Conekta\Lang;
use \Conekta\Error;
use \Conekta\Conekta;

class Card extends Resource
{
    var $created_at = "";
    var $last4      = "";
    var $bin        = "";
    var $name       = "";
    var $exp_month  = "";
    var $exp_year   = "";
    var $brand      = "";
    var $parent_id  = "";
    var $default    = "";

    public function __get($property)
    {   
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function  __isset($property)
    {
        return isset($this->$property);
    }


    public function instanceUrl()
    {
        $id = $this->id;
        if (!$id) {
            $error = new Error(
                Lang::translate('error.resource.id', Lang::EN, array('RESOURCE' => get_class())),
                Lang::translate('error.resource.id_purchaser', Conekta::$locale)
            );

            if($this->apiVersion = '2.0.0'){
                $errorList = new ErrorList();
                array_push($errorList->details, $error);
                throw $errorList;
            }
            throw $error;
        }

        $class = get_class($this);
        $base = $this->classUrl($class);
        $extn = urlencode($id);
        $customerUrl = $this->customer->instanceUrl();

        return $customerUrl . $base . "/{$extn}";
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public function delete()
    {
        return parent::_delete('customer', 'cards');
    }
}
