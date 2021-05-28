<?php

class MyDate
{
  static function toAmerican(string $date)
  {
    try {
      $date = str_replace('/', '-', $date);
      $timezone = new DateTimeZone('America/Sao_Paulo');
      $now = new DateTime($date, $timezone);
      return $now->format('Y-m-d');
    } catch (\Throwable $th) {
      return false;
    }
  }

  static function toBrasilian(string $date)
  {
    $arrayDate = explode('-', $date);
    return end($arrayDate) . '/' . $arrayDate[1] . '/' . $arrayDate[0];
  }

  static function toggle(string $date)
  {
    try {
      $brasilian = preg_match('/^(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](18|19|20)\d\d$/', $date);
      $american = preg_match('/(18|19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/', $date);
      if ($brasilian) return self::toAmerican($date);
      if ($american) return self::toBrasilian($date);
      throw new Exception('Formato de data inválido');
    } catch (Exception $e) {
      return ['verif' => false, 'exception' => $e->getMessage()];
    }
  }
}
