<?php

include('_connection.php');

if ($_GET) {
  $id = $_GET['id'];

  $time = time();
  mysqli_query($connection, "UPDATE gadgets SET deleted_at = $time WHERE id='$id'");

  if (mysqli_affected_rows($connection) > 0) {
    echo true;
  } else {
    echo false;
  }
} else {
  header("Location: index.php");
}
