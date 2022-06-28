<?php

include('_connection.php');

function query($query)
{
  global $connection;
  $result = mysqli_query($connection, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function dividen_normalization($matrix)
{
  for ($i = 0; $i < 7; $i++) {
    $square[$i] = 0;
    for ($j = 0; $j < sizeof($matrix); $j++) {
      $square[$i] = $square[$i] + pow($matrix[$j][$i], 2);
    }
    $dividen[$i] = sqrt($square[$i]);
  }

  return $dividen;
}

function transpoze($square_array)
{
  if ($square_array == null) return null;

  $rotated_array = array();
  $r = 0;

  foreach ($square_array as $row) {
    $c = 0;

    if (is_array($row)) {
      foreach ($row as $cell) {
        $rotated_array[$c][$r] = $cell;
        ++$c;
      }
    } else $rotated_array[$c][$r] = $row;
    ++$r;
  }

  return $rotated_array;
}

function distance_ideal($aplus, $bob)
{
  for ($i = 0; $i < sizeof($bob); $i++) {
    $dplus[$i] = 0;

    for ($j = 0; $j < sizeof($aplus); $j++) {
      $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]), 2);
    }

    $dplus[$i] = round(sqrt($dplus[$i]), 4);
  }

  return $dplus;
}

function get_gagdets()
{
  return query("SELECT * FROM gadgets WHERE deleted_at=0");
}
