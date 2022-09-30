<?php

namespace Conekta;

class ConektaList extends ConektaObject
{
    /**
     * @const int
     */
    public const LIMIT = 5;
    public $elements_type;
    public $params;
    public $total;

    /**
     * @param $elements_type
     * @param $params
     */
    public function __construct($elements_type, $params = [])
    {
        parent::__construct();
        $this->elements_type = $elements_type;
        $this->params = $params;
        $this->total = 0;
    }

    /**
     * @param $element
     * @return $this
     */
    public function addElement($element): static
    {
        $element = Util::convertToConektaObject($element);
        $array_length = count($this->_values);
        $this[$array_length] = $element;
        $this->_values[$array_length] = $element;
        $this->total = $this->total + 1;

        return $this;
    }

    /**
     * @param int[] $options
     * @return void
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function next(array $options = ['limit' => self::LIMIT]): void
    {
        if (sizeOf($this) > 0) {
            $array = (array)$this;
            $this->params['next'] = end($array)->id;
        }

        $this->params['previous'] = null;
        $this->_moveCursor($options['limit']);
    }

    /**
     * @param $limit
     * @return void
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    protected function _moveCursor($limit): void
    {
        if (isset($limit)) {
            $this->params['limit'] = $limit;
        }

        $class = Util::$types[strtolower($this->elements_type)];
        $url = ConektaResource::classUrl($class);
        $requestor = new Requestor();
        $response = $requestor->request('get', $url, $this->params);

        $this->loadFromArray($response);
    }

    /**
     * @param $values
     * @return void
     */
    public function loadFromArray($values = null): void
    {
        if (isset($values)) {
            $this->has_more = $values['has_more'];
            $this->total = $values['total'];

            foreach ($this as $key => $value) {
                $this->_unsetKey($key);
            }
        }

        if (isset($values['data'])) {
            parent::loadFromArray($values['data']);
        }
    }

    /**
     * @param array $options
     * @return void
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function previous(array $options = ['limit' => self::LIMIT]): void
    {
        if (sizeOf($this) > 0) {
            $this->params['previous'] = $this[0]->id;
        }

        $this->params['next'] = null;
        $this->_moveCursor($options['limit']);
    }
}
