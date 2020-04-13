<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once "autoload.php";
include_once "Controller.php";
include_once "admin/config.php";

class Template_2 extends Controller {
  private $model;

  public function __construct() {
    require_once (DIR_MODEL."/Template_2_Model.php");
    $this->model = new Template_2_Model;
    $this->getTemplate();
  }

  public function readTemplate ($template_id) {
    $template_data = $this->model->read($template_id);
    $template_data = $this->sqlToArray($template_data);
    $template_url = $this->model->readTemplateUrl($template_id);
    $template_url = $this->sqlToArray($template_url);
    $template_info = array(
      "data" => $template_data,
      "url" => $template_url
    );

    return $template_info;
  }

  public function getTemplate(){
    $texto = $this->model->read(1);
    $texto = $this->sqlToArray($texto);
  }

  public function sqlToArray($query) {
    $data = mysqli_fetch_all ($query, MYSQLI_ASSOC);

    return $data;
  }

  public function createTemplate($postInfo) {
    $postInfo['user-id'] = $_SESSION['user'];
    
    if (!isset($postInfo["template-id"])) {
      $postInfo["template-id"] = $this->model->ultimoId("`template_2`");
      $postInfo["template-id"]++;
    }

    if (isset($postInfo["files"]) && $postInfo["files"]["bg-img"]["error"] == 0) {
      $bg_img = $this->uploadImg($postInfo["files"]);
      $postInfo["bg-img"] = $bg_img["bg-img"];
    }

    $this->model->create($postInfo);
    $this->model->createTemplateUrl($postInfo);
    $this->changeAllToInactive();
    $this->model->updateTemplateToActive($postInfo["template-id"], "`template_2`");

    $_SESSION["id"] = $postInfo["template-id"];
    $_SESSION["edit"] = true;
    if ($bg_img["error"] == 1) {
      header("Location: ../view/template_menu_2.php?errorImg=1");
    } else {
      header("Location: ../view/template_menu_2.php?");
    }
  }

  public function createTemplateBlock1($postInfo) {
    $this->model->createTemplateBlock1($postInfo);
    
    header("Location: ../view/template_block1_2.php?");
  }

  public function createTemplateBlock2($postInfo) {
    $images = $this->uploadImg($postInfo["files"]);

    if (isset($images)){
      foreach ($images as $key=>$img) {
        $postInfo[$key] = $img;
      }
    }

    $this->model->createTemplateBlock2($postInfo);
    if ($images["error"] == 1) {
      header("Location: ../view/template_block2_2.php?errorImg=1");
    } else {
      header("Location: ../view/template_block2_2.php?");
    }
  }

  public function createTemplateTestimonial2($postInfo) {
    $images = $this->uploadImg($postInfo["files"]);

    if (isset($images)){
      foreach ($images as $key=>$img) {
        $postInfo[$key] = $img;
      }
    }

    $this->model->createTemplateTestimonial2($postInfo);
    if ($images["error"] == 1) {
      header("Location: ../view/template_testimonial_2.php?errorImg=1");
    } else {
      header("Location: ../view/template_testimonial_2.php?");
    }    
  }

  public function createTemplateFooter2($postInfo) {
    $images = $this->uploadImg($postInfo["files"]);

    foreach ($images as $key=>$img) {
      $postInfo[$key] = $img;
    }

    $this->model->createTemplateFooter2($postInfo);
    if ($images["error"] == 1) {
      header("Location: ../view/template_Footer_2.php?errorImg=1");  
    } else {
      header("Location: ../view/template_Footer_2.php?");
    }
  }

  public function readActiveTemplate() {
    $active = $this->model->readActiveTemplate();
    return $active;
  }

  public function readTemplateBlock1($id) {
    $block1 = $this->model->readTemplateBlock1($id);
    $block1 = $this->sqlToArray($block1);
    if (!isset($block1[0])) {
      return false;
    } 
    $block1 = $block1[0];
    
    return($block1);
  }

  public function readTemplateBlock2($id) {
    $block2 = $this->model->readTemplateBlock2($id);
    $block2 = $this->sqlToArray($block2);
    if (!isset($block2[0])) {
      return false;
    }
    $block2 = $block2[0];

    return($block2);
  }

  public function readTemplateFooter($id) {
    $footer = $this->model->readTemplateFooter($id);
    $footer = $this->sqlToArray($footer);
    if (!isset($footer[0])) {
      return false;
    } 
    $footer = $footer[0];

    return($footer);
  }

  public function readTemplateTestimonial2($id) {
    $testimonial = $this->model->readTemplateTestimonial2($id);
    $testimonial = $this->sqlToArray($testimonial);
    if (!isset($testimonial[0])) {
      return false;
    } 
    $testimonial = $testimonial[0];

    return($testimonial);
  }

  public function deleteTemplate($postInfo) {
    $id = $postInfo["template-id"];
    $query = $this->model->deleteTemplate($id);

    header("Location: ../home.php");
  }

  public function deleteTemplate2($postInfo) {
    $id = $postInfo["template-id"];
    $query = $this->model->deleteTemplate2($id);

    header("Location: ../home.php");
  }

  public function changeActiveTemplate($postInfo) {
    $oldActive = $this->readActiveTemplate();
    $setInactive = $this->model->updateTemplateToInactive($oldActive["id"], $oldActive["table"]);
    if(isset($postInfo["template_home"]) && $postInfo["template_home"] != "") {
      $setActive = $this->model->updateTemplateToActive($postInfo["template_home"], "template");
    } else if (isset($postInfo["template_home_2"]) && $postInfo["template_home_2"] != "") {
      $setActive = $this->model->updateTemplateToActive($postInfo["template_home_2"], "template_2");
    }

    header("Location: ../home.php");
  }

  public function changeAllToInactive() {
    $result = $this->model->updateAllToInactive();
    return $result;
  }

  public function generateTemplate() {
    $active = $this->readActiveTemplate();
    if ($active['table'] == "`template_2`") {
      $page = array(
        "main" => $this->readTemplate($active["id"]),
        "block1" => $this->readTemplateBlock1($active["id"]),
        "block2" => $this->readTemplateBlock2($active["id"]),
        "testimonial" => $this->readTemplateTestimonial2($active["id"]),
        "footer" => $this->readTemplateFooter($active["id"])
      );
    }

    return $page;
  }

  public function uploadImg($files) {
    $count = 0;
    $newDir = null;
    foreach ($files as $key=>$img) {
      if(isset($img) && $img["size"] > 0)
      $auxDir = DIR_IMG_UP."/";
      $auxDir = $auxDir . basename($img["name"]);
      $ext = strtolower(pathinfo(($auxDir),PATHINFO_EXTENSION)); //Pegando extensão do arquivo
      $imgNameSize = strlen($img["name"]) - 4;
      $imgName = strtolower(substr($img['name'], 0, $imgNameSize));
      $upTime = new DateTime();
      $new_name = $upTime->format('Y.m.d-H.i.u') .  $imgName . "." . $ext; //Definindo um novo nome para o arquivo
      $new_name = str_replace("'", "a", $new_name);
      $dir = DIR_IMG_UP."/"; //Diretório para uploads 
      {
        $uploadOk = 1;
        $checkImg = getimagesize($img["tmp_name"]);
        if ($uploadOk == 1 && $checkImg !== false) { //Checa se o arquivo é uma imagem
          $uploadOk = 1;
        } else {
          $uploadOk = 0;
        }
        if ($uploadOk == 1 && $img["size"] < 50000000) { //Checa se o arquivo é menor que 50mb
          $uploadOk = 1;
        } else {
          $uploadOk = 0;
        }
        if ($uploadOk == 0) {
          $uploadOk == 0;
        } else if ($uploadOk == 1 && $ext != "jpg" && $ext != "png" && $ext != "jpeg") {
          $uploadOk = 0;
        } else {
          $uploadOk = 1;
        } 
        if ($uploadOk == 1) {
          move_uploaded_file($img['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
          $newDir[$key] = $new_name;
        } else {
          $newDir["error"] = 1;
        }
      }
    $count++;
    }

    return $newDir;
  }

  public function routeForm($postInfo){
    if (isset($postInfo['salvar-template'])) {
      $this->createTemplate($postInfo);
    } else if (isset($postInfo['update-block1-2'])) {
      $this->createTemplateBlock1($postInfo);
    } else if (isset($postInfo['update-block2-2'])) {
      $this->createTemplateBlock2($postInfo);
    } else if (isset($postInfo['update-footer-2'])) {
      $this->createTemplateFooter2($postInfo);
    } else if (isset($postInfo['update-testimonial-2'])) {
      $this->createTemplateTestimonial2($postInfo);
    } else if (isset($postInfo['confirmar_home'])) {
      $this->changeActiveTemplate($postInfo);
    } else if (isset($postInfo['delete-template'])) {
      $this->deleteTemplate($postInfo);
    } else if (isset($postInfo['delete-template-2'])) {
      $this->deleteTemplate2($postInfo);
    }
  }
}

$controller = new Template_2();
$postInfo = $_POST;
if (isset($_FILES)) {
  $postInfo["files"] = $_FILES; 
}
$controller->routeForm($postInfo);