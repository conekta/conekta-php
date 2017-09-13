<?php 

namespace Conekta;

use \Conekta\ConektaResource;

class Webhook extends ConektaResource
{
  public static function find($id)
  {
    $class = get_called_class();

    return parent::_scpFind($class, $id);
  }

  public static function where($params = null)
  {
    $class = get_called_class();

    return parent::_scpWhere($class, $params);
  }

  public static function create($params = null)
  {
    $class = get_called_class();

    return parent::_scpCreate($class, $params);
  }

  public function delete()
  {
    return parent::_delete();
  }

  public function update($params = null)
  {
    return parent::_update($params);
  }
}
