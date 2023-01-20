<?php

namespace Conekta;

use Conekta\{Conekta, ConektaResource, Exceptions, Requestor, Util};

class ConektaList extends ConektaObject
{
    public const LIMIT = 5;

    public function __construct($elements_type, $params = [])
    {
        parent::__construct();
        $this->elements_type = $elements_type;
        $this->params = $params;
        $this->total = 0;
    }

    public function addElement($element)
    {
        $element = Util::convertToConektaObject($element);
        $array_length = count($this->_values);
        $this[$array_length] = $element;
        $this->_values[$array_length] = $element;
        $this->total = $this->total + 1;

        return $this;
    }

    public function loadFromArray($values = null)
    {
        if (isset($values)) {
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

    public function next($options = ['limit' => self::LIMIT])
    {
        if (sizeOf($this) > 0) {
            $array = (array) $this;
            $this->params['next'] = end($array)->id;
        }

        $this->params['previous'] = null;
        return $this->_moveCursor($options['limit']);
    }

    public function previous($options = ['limit' => self::LIMIT])
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
        $url = ConektaResource::classUrl($class);
        $requestor = new Requestor();
        $response = $requestor->request('get', $url, $this->params);

        return $this->loadFromArray($response);
    }
}
