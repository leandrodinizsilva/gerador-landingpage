<?php 
require_once ("admin/inc/db.php");
$DB = new DB;
$db = $DB->connect();
if ($_GET) {
  $getKeys = array_keys($_GET);

  if (isset($_GET["loja"]) && $_GET["loja"] != null) {
    $userId = $_GET["loja"];
    //Lê no banco de dados os dados do template ativo do usuário colocado no GET
    $activeTemplate = $DB->selectdb($db,"*","`active_template`","`user_id` = '{$userId}'");
    $activeTemplate = mysqli_fetch_all ($activeTemplate, MYSQLI_ASSOC);

    if ($activeTemplate != null) { //Verifica se encontrou algum template / usuário no link
      $activeTemplate = $activeTemplate[0];
      if ($activeTemplate["table_name"] == "template") {
        $sql_template = $DB->selectdb(
          $db,"`id`,`titulo`,`logotipo`,`cor_primaria`,`cor_secundaria`,`cor_terciaria`",
          "`template`", "`id`= '{$activeTemplate["template_id"]}'"
        );
        include_once("indexOriginal.php");
      } else if ($activeTemplate["table_name"] == "template_2") {
        $userId = $userId;
        $localhost = "/gerador-landingpage";
        include_once("template2.php");
      }
    } else {
      echo "Loja não encontrada, ou link inválido";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>