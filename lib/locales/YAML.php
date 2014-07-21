<?php
abstract class YAML
{ 
  const EN = 'en';
  const ES = 'es';
  public static function translate($key, $parameters=null, $locale)
  {
    $yaml = array_merge(
      (array) yaml_parse_file(dirname(__FILE__) . '/en.yml'),
      (array) yaml_parse_file(dirname(__FILE__) . '/es.yml')
    );
    $keys = explode(".", $locale . '.' .$key);
    $result = $yaml[array_shift($keys)];
    foreach ($keys as $v) {
      $result = $result[$v];
    }
    if (is_array($parameters) && !empty($parameters)) {
      foreach($parameters as $k => $v) {
        $result = str_replace($k,$v,$result);
      }
    }
    return $result;
  }
}
?>
