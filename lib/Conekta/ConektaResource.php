<?php

namespace Conekta;

use ReflectionClass;

abstract class ConektaResource extends ConektaObject
{
    /**
     * @param $class
     * @return string
     */
    public static function className($class): string
    {
        // Useful for namespaces: Foo\Charge
        if ($postfix = strrchr($class, '\\')) {
            $class = substr($postfix, 1);
        }
        if (substr($class, 0, strlen('Conekta')) == 'Conekta') {
            $class = substr($class, strlen('Conekta'));
        }
        $class = str_replace('_', '', $class);
        $name = urlencode($class);
        $name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $name));

        return $name;
    }

    /**
     * @param $class
     * @param $params
     * @return ConektaList|ConektaObject
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected static function _scpWhere($class, $params): ConektaList|ConektaObject
    {
        if (Conekta::$apiVersion == '2.0.0') {
            $path = explode('\\', $class);
            $instance = new ConektaList(array_pop($path));
        } else {
            $instance = new ConektaObject();
        }
        $requestor = new Requestor();
        $url = self::classUrl($class);
        $response = $requestor->request('get', $url, $params);
        $instance->loadFromArray($response);

        return $instance;
    }

    /**
     * @param $class
     * @return string
     * @throws NoConnectionError
     */
    public static function classUrl($class = null): string
    {
        if (empty($class)) {
            throw new NoConnectionError(
                Lang::translate('error.resource.id', Lang::EN, ['RESOURCE' => 'NULL']),
                Lang::translate('error.resource.id_purchaser', Conekta::$locale)
            );
        }
        $base = self::_getBase($class, 'className', $class);
        return "/{$base}s";
    }

    /**
     * @param $class
     * @param $method
     * @return mixed
     */
    protected static function _getBase($class, $method): mixed
    {
        $args = array_slice(func_get_args(), 2);

        return call_user_func_array([$class, $method], $args);
    }

    /**
     * @param $class
     * @param $id
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected static function _scpFind($class, $id): mixed
    {
        $instance = new $class($id);
        $requestor = new Requestor();
        $url = $instance->instanceUrl();
        $response = $requestor->request('get', $url);
        $instance->loadFromArray($response);

        return $instance;
    }

    /**
     * @return string
     * @throws ParameterValidationError
     * @throws NoConnectionError
     */
    public function instanceUrl(): string
    {
        $id = $this->id;
        $this->idValidator($id);
        $class = get_class($this);
        $base = $this->classUrl($class);
        $extn = urlencode($id);

        return "{$base}/{$extn}";
    }

    /**
     * @param $id
     * @return void
     * @throws ParameterValidationError
     */
    protected function idValidator($id): void
    {
        if (!$id) {
            $error = new ParameterValidationError(
                Lang::translate('error.resource.id', Lang::EN, ['RESOURCE' => get_class()]),
                Lang::translate('error.resource.id_purchaser', Conekta::$locale)
            );

            if (Conekta::$apiVersion == '2.0.0') {
                $handler = new Handler();
                $handler = $error;
                throw $handler;
            }
            throw $error;
        }
    }

    /**
     * @param $class
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected static function _scpCreate($class, $params): mixed
    {
        $requestor = new Requestor();
        $url = self::classUrl($class);
        $params = is_array($params) ? $params : [];
        $response = $requestor->request('post', $url, $params);
        $instance = new $class();
        $instance->loadFromArray($response);

        return $instance;
    }

    /**
     * @param null $parent
     * @param null $member
     * @return $this
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected function _delete($parent = null, $member = null): static
    {
        self::_customAction('delete', null, null);
        if (isset($parent, $member)) {
            $obj = $this->{$parent}->{$member};
            if (strpos(get_class($obj), 'ConektaObject') !== false) {
                foreach ($this->{$parent}->{$member} as $k => $v) {
                    if (strpos($v->id, $this->id) !== false) {
                        $this->{$parent}->{$member}->_values = Util::shiftArray($this->{$parent}->{$member}->_values, $k);
                        $this->{$parent}->{$member}->loadFromArray($this->{$parent}->{$member}->_values);
                        $this->{$parent}->{$member}->offsetUnset(count($this->{$parent}->{$member}) - 1);
                        break;
                    }
                }
            }
        }

        return $this;
    }

    /**
     * @param $method
     * @param $action
     * @param array|null $params
     * @return $this
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected function _customAction($method = 'post', $action = null, ?array $params = []): static
    {
        $requestor = new Requestor();
        if (isset($action)) {
            $url = $this->instanceUrl() . '/' . $action;
        } else {
            $url = $this->instanceUrl();
        }

        $response = $requestor->request($method, $url, $params);
        $this->loadFromArray($response);

        return $this;
    }

    /**
     * @param $params
     * @return $this
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected function _update($params): static
    {
        $requestor = new Requestor();
        $url = $this->instanceUrl();
        $response = $requestor->request('put', $url, $params);
        $this->loadFromArray($response);

        return $this;
    }

    /**
     * @param $member
     * @param $params
     * @param $parent
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected function _createMemberWithRelation($member, $params, $parent): mixed
    {
        $parent_class = strtolower((new ReflectionClass($parent))->getShortName());
        $child = self::_createMember($member, $params);
        $child->{$parent_class} = $parent;

        return $child;
    }

    /**
     * @param $member
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @throws NoConnectionError
     */
    protected function _createMember($member, $params): mixed
    {
        $requestor = new Requestor();
        $url = $this->instanceUrl() . '/' . $member;
        $response = $requestor->request('post', $url, $params);

        if ((!empty($this->{$member})
                && (str_contains(get_class($this->{$member}), 'ConektaList')
                    || str_contains(get_class($this->{$member}), 'ConektaObject')))
            || str_contains($member, 'cards')
            || str_contains($member, 'charges')
            || str_contains($member, 'discount_lines')
            || str_contains($member, 'line_items')
            || str_contains($member, 'payment_sources')
            || str_contains($member, 'payout_methods')
            || str_contains($member, 'shipping_contacts')
            || str_contains($member, 'shipping_lines')
            || str_contains($member, 'tax_lines')) {
            $this->createMemberProperty($member);
            $this->setMemberValues($member, $response);
            $instances = $this->{$member};
            $instance = $instances[count($instances) - 1];
        } else {
            $class = '\\Conekta\\' . ucfirst($member);

            $instance = new $class();
            $instance->loadFromArray($response);
            $this->{$member} = $instance;
            $this->_setVal($member, $instance);
            $this->loadFromArray();
        }

        return $instance;
    }

    /**
     * @param $member
     * @return void
     */
    protected function createMemberProperty($member): void
    {
        if (empty($this->{$member})) {
            $this->{$member} = (Conekta::$apiVersion == '2.0.0') ? new ConektaList($member) : new ConektaObject();
        }
    }

    /**
     * @param $member
     * @param $response
     * @return void
     */
    protected function setMemberValues($member, $response): void
    {
        if (str_contains(get_class($this->{$member}), 'ConektaList')) {
            $this->{$member}->addElement($response);
        } else {
            $this->{$member}->loadFromArray(array_merge(
                $this->{$member}->_toArray(),
                [$response]
            ));

            $this->loadFromArray();
        }
    }
}
