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
        $this->total = 0;
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
            $this->has_more = $values['has_more'];
            $this->total    = $values['total'];

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
            $this->params['next'] = end($this)->id;
        }

        $this->params['previous'] = null;

        return $this->_moveCursor($options['limit']);
    }

    public function previous($options = array())
    {
        if (sizeOf($this) > 0) {
            $this->params['previous'] = $this[0]->id;
        }

        $this->params['next'] = null;

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
