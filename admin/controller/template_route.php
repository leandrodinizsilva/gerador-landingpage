<?php
$keys = array_keys($_POST);

foreach ($keys as $key) {
  if ($key == 'template') {
    if ($_POST[$key] == "template1"){
      header('Location: ../template.php');
    } else if ($_POST[$key] == "template2") {
      header('Location: ../view/template_menu_2.php');
    } else if ($_POST[$key] == "template3") {
      header('Location: ./template_3.php');
    }
  }
}