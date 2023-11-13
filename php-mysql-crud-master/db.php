<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'ferrari'
) or die(mysqli_erro($mysqli));

?>
