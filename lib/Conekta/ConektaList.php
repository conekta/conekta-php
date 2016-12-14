<?php

namespace Conekta;

use \Conekta\Resource;
use \Conekta\Requestor;
use \Conekta\Util;
use \Conekta\Error;
use \Conekta\Conekta;

class ConektaList extends Object
{
    public function __construct($elements_type, $params = array())
    {
        parent::__construct();
        $this->elements_type = $elements_type;
        $this->params = $params;
    }

    public function addElement($element)
    {
        $element = Util::convertToConektaObject($element);
        $this[$this->total] = $element;
        $this->_values[$this->total] = $element;
        $this->total = $this->total + 1;

        return $this;
    }

    public function loadFromArray($values = null)
    {
        if (isset($values)) {
            $this->starting_after = $values['starting_after'];
            $this->ending_before = $values['ending_before'];
            $this->has_more = $values['has_more'];
            $this->total = $values['total'];

            foreach ($this as $key => $value) {
                $this->_unsetKey($key);
            }
        }

        if (isset($values['data'])) {
            return parent::loadFromArray($values['data']);
        }
    }

    public function next($options = array())
    {
        if (sizeOf($this) > 0) {
            if (isset($this->ending_before)) {
                $this->params['starting_after'] = $this[0]->id;
            } else {
                $this->params['starting_after'] = end($this)->id;
            }
        }
        $this->params['ending_before'] = null;

        return $this->_moveCursor($options['limit']);
    }

    public function previous($options = array())
    {
        if (sizeOf($this) > 0) {
           if (isset($this->ending_before)) {
               $this->params['ending_before'] = end($this)->id;
           } else {
               $this->params['ending_before'] = $this[0]->id;
           }
        }
        $this->params['starting_after'] = null;

        return $this->_moveCursor($options['limit']);
    }

    protected function _moveCursor($limit)
    {
        if (isset($limit)) {
            $this->params['limit'] = $limit;
        }

        $class = Util::$types[strtolower($this->elements_type)];
        $url = Resource::classUrl($class);
        $requestor = new Requestor();
        $response = $requestor->request('get', $url, $this->params);

        return $this->loadFromArray($response);
    }
}