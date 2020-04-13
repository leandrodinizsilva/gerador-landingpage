<?php
include_once "autoload.php";
if (!isset($_SESSION)) {
  session_start();
}

class Template_2_Model {
  private $dbConection;
  private $db;
  private $table;

  public function __construct() {
    require_once (DIR_INC."/db.php");
    $this->db = new DB;
    $this->dbConection =  $this->db->connect();
    $this->table = "template_2";
  }

  public function create($data) {
    if (isset($data["bg-img"])) {
      $query = "INSERT INTO $this->table (`id`,`title`, `background_image`, `main_color`, `secondary_color`, `main_text_color`, `secondary_text_color`, `user_id`, `main_text` )" .
      " VALUES ('{$data["template-id"]}','{$data["title"]}', '{$data["bg-img"]}', '{$data["main-color"]}', '{$data["secondary-color"]}', '{$data["main-text-color"]}', " .
      "'{$data["secondary-text-color"]}', '{$data["user-id"]}', '{$data["main-text"]}') " .
      "ON DUPLICATE KEY UPDATE title = '{$data["title"]}', background_image = '{$data["bg-img"]}', main_color = '{$data["main-color"]}', " .
      "secondary_color = '{$data["secondary-color"]}', main_text_color = '{$data["main-text-color"]}', " .
      "secondary_text_color = '{$data["secondary-text-color"]}', main_text = '{$data["main-text"]}', " .
      "user_id = '{$data["user-id"]}';";
    } else {
      $query = "INSERT INTO $this->table (`id`,`title`, `main_color`, `secondary_color`, `main_text_color`, `secondary_text_color`, `user_id`, `main_text` )" .
      " VALUES ('{$data["template-id"]}','{$data["title"]}', '{$data["main-color"]}', '{$data["secondary-color"]}', '{$data["main-text-color"]}', " .
      "'{$data["secondary-text-color"]}', '{$data["user-id"]}', '{$data["main-text"]}') " .
      "ON DUPLICATE KEY UPDATE title = '{$data["title"]}', main_color = '{$data["main-color"]}', " .
      "secondary_color = '{$data["secondary-color"]}', main_text_color = '{$data["main-text-color"]}', " .
      "secondary_text_color = '{$data["secondary-text-color"]}', main_text = '{$data["main-text"]}', " .
      "user_id = '{$data["user-id"]}';";
    }

    $result = $this->dbConection->query($query);
    return $result;
  }

  public function createTemplateUrl($data) {
    $query = null;

    foreach ($data['template_url'] as $key=>$url) {
      if (isset($data["url-id"][$key])) {
        $query = $this->db->updatedb($this->dbConection, "`template_url_2`",
        "`url` =  '{$url}',
        `date_start` = '{$data["url-date-start"]}',
        `date_end` = '{$data["url-date-end"]}'
        ", " `id` = '{$data["url-id"][$key]}'");
      } else {
        $query = $this->db->insertdb($this->dbConection, "`template_url_2`",
        "`url`,`template_id`, `date_start`, `date_end`","
        '{$url}',
        '{$data["template-id"]}',
        '{$data["url-date-start"][$key]}',
        '{$data["url-date-end"][$key]}'");
      }
    }

    return $query;
  }

  public function createTemplateBlock1($data) {
    $query = "INSERT INTO template_block1_2(template_id, text_1, icon_1, text_2, icon_2, text_3, " .
    "icon_3, title_1, title_2, title_3)" . 
    " VALUES ('{$data["template-id"]}','{$data["text-1"]}','{$data["icon-1"]}','{$data["text-2"]}', " .
    "'{$data["icon-2"]}','{$data["text-3"]}','{$data["icon-3"]}', '{$data["title-1"]}', " .
    "'{$data["title-2"]}', '{$data["title-3"]}' ) " .
    "ON DUPLICATE KEY UPDATE template_id = '{$data["template-id"]}', text_1 = '{$data["text-1"]}', " .
    "icon_1 = '{$data["icon-1"]}', text_2 = '{$data["text-2"]}', icon_2 = '{$data["icon-2"]}', " .
    "text_3 = '{$data["text-3"]}', icon_3 = '{$data["icon-3"]}', title_1 = '{$data["title-1"]}', " .
    " title_2 = '{$data["title-2"]}', title_3 = '{$data["title-3"]}' ;";
    
    $result = $this->dbConection->query($query);
    return $result;
  }

  public function createTemplateBlock2($data) {

    
    $query = "INSERT INTO template_block2_2(template_id, text_1, text_2," .
    " text_3, title_1, title_2, title_3)" . 
    " VALUES ('{$data["template-id"]}', '{$data["text-1"]}', '{$data["text-2"]}', " .
    "'{$data["text-3"]}'," .
    "'{$data["title-1"]}', '{$data["title-2"]}', '{$data["title-3"]}') " .
    "ON DUPLICATE KEY UPDATE template_id = '{$data["template-id"]}', text_1 = '{$data["text-1"]}', " .
    "text_2 = '{$data["text-2"]}', text_3 = '{$data["text-3"]}'," .
    "title_1 = '{$data["title-1"]}', title_2 = '{$data["title-2"]}', title_3 = '{$data["title-3"]}';";

    $result = $this->dbConection->query($query);

    if (isset($data['image-1'])) {
      $query = "UPDATE template_block2_2 SET `image_1` = '{$data["image-1"]}' WHERE `template_id` = '{$data["template-id"]}' ;";
      $result = $this->dbConection->query($query);
    }
    if (isset($data['image-2'])) {
      $query = "UPDATE template_block2_2 SET `image_2` = '{$data["image-2"]}' WHERE `template_id` = '{$data["template-id"]}' ;";
      $result = $this->dbConection->query($query);
    }
    if (isset($data['image-3'])) {
      $query = "UPDATE template_block2_2 SET `image_3` = '{$data["image-3"]}' WHERE `template_id` = '{$data["template-id"]}' ;";
      $result = $this->dbConection->query($query);
    }


    return $result;
  }

  public function createTemplateFooter2($data) {
    if (isset($data["background-img"])) {
      $query = "INSERT INTO template_footer_2(template_id, background_img, facebook, instagram, twitter)" . 
      " VALUES ('{$data["template-id"]}','{$data["background-img"]}','{$data["facebook"]}','{$data["instagram"]}', " .
      "'{$data["twitter"]}') ON DUPLICATE KEY UPDATE " .
      "template_id = '{$data["template-id"]}', background_img = '{$data["background-img"]}', " .
      "facebook = '{$data["facebook"]}', instagram = '{$data["instagram"]}', twitter = '{$data["twitter"]}' ;";
    } else {
      $query = "INSERT INTO template_footer_2(template_id, facebook, instagram, twitter)" . 
      " VALUES ('{$data["template-id"]}', '{$data["facebook"]}', '{$data["instagram"]}', " .
      "'{$data["twitter"]}') ON DUPLICATE KEY UPDATE " .
      "template_id = '{$data["template-id"]}', " .
      "facebook = '{$data["facebook"]}', instagram = '{$data["instagram"]}', twitter = '{$data["twitter"]}' ;";
    }

    $result = $this->dbConection->query($query);
    return $result;
  }

  public function createTemplateTestimonial2($data) {
    $query = "INSERT INTO template_testimonial_2 (template_id, name_1, " .
    " testimonial_1, name_2, testimonial_2, name_3, testimonial_3) " .
    " VALUES ('{$data["template-id"]}', '{$data["name-1"]}', '{$data["testimonial-1"]}', " .
    "'{$data["name-2"]}', '{$data["testimonial-2"]}', ". 
    "'{$data["name-3"]}', '{$data["testimonial-3"]}') ON DUPLICATE KEY UPDATE " .
    "template_id = '{$data["template-id"]}', name_1 = '{$data["name-1"]}', " .
    "testimonial_1 = '{$data["testimonial-1"]}', name_2 = '{$data["name-2"]}', " .
    "testimonial_2 = '{$data["testimonial-2"]}', name_3 = '{$data["name-3"]}', " .
    "testimonial_3 = '{$data["testimonial-3"]}'; ";
    $result = $this->dbConection->query($query);

    if (isset($data['image-1'])) {
      $query = "UPDATE template_testimonial_2 SET `image_1` = '{$data["image-1"]}' WHERE `template_id` = '{$data["template-id"]}' ;";
      $result = $this->dbConection->query($query);
    }

    if (isset($data['image-2'])) {
      $query = "UPDATE template_testimonial_2 SET `image_2` = '{$data["image-2"]}' WHERE `template_id` = '{$data["template-id"]}' ;";
      $result = $this->dbConection->query($query);
    }

    if (isset($data['image-3'])) {
      $query = "UPDATE template_testimonial_2 SET `image_3` = '{$data["image-3"]}' WHERE `template_id` = '{$data["template-id"]}' ;";
      $result = $this->dbConection->query($query);
    }
    
    return $result;
  }

  public function readAll($user_id) {
    $query = $this->db->selectdb($this->dbConection,"*", $this->table, "user_id = '{$user_id}'");

    return $query;
  }

  public function read($id) {
    $query = $this->db->selectdb($this->dbConection,"*", $this->table, "id = '{$id}'");

    return $query;
  }

  public function readTemplateUrl($id) {
    $query = $this->db->selectdb($this->dbConection, "*", "`template_url_2`", "template_id = '{$id}'");
    
    return $query;
  }

  public function readActiveTemplate() {
    $template1 = $this->db->selectdb($this->dbConection, "*", "`template`", "active = 1");
    $template2 = $this->db->selectdb($this->dbConection, "*",  $this->table, "active = 1");
    $template1 = mysqli_fetch_all ($template1, MYSQLI_ASSOC);
    $template2 = mysqli_fetch_all ($template2, MYSQLI_ASSOC);
    if (isset($template1[0]["active"]) && $template1[0]["active"] == 1) {
      $activeTemplate = array (
        "id" => $template1[0]["id"],
        "title" => $template1[0]["titulo"],
        "table" => "`template`"
      );
    } else if (isset($template2[0]["active"]) && $template2[0]["active"] == 1) {
      $activeTemplate = array (
        "id" => $template2[0]["id"],
        "title" => $template2[0]["title"],
        "table" => "`template_2`"
      );
    } else {
      $activeTemplate = null;
    }

    return $activeTemplate;
  }

  public function readTemplateBlock1 ($id) {
    $result = $this->db->selectdb($this->dbConection, "*", "`template_block1_2`", "template_id = '{$id}'");
    return $result;
  }

  public function readTemplateBlock2 ($id) {
    $result = $this->db->selectdb($this->dbConection, "*", "`template_block2_2`", "template_id = '{$id}'");
    return $result;
  }

  public function readTemplateFooter ($id) {
    $result = $this->db->selectdb($this->dbConection, "*", "`template_footer_2`", "template_id = '{$id}'");
    return $result;
  }

  public function readTemplateTestimonial2 ($id) {
    $result = $this->db->selectdb($this->dbConection, "*", "`template_testimonial_2`", "template_id = '{$id}'");
    return $result;
  }

  public function updateTemplateToInactive($id, $table) {
    $result = $this->db->updatedb(
      $this->dbConection, $table, "
      `active` = 0","
      `id`= '{$id}'"
    );
  }

  public function updateTemplateToActive($id, $table) {
    $result = $this->db->updatedb(
      $this->dbConection, $table, "
      `active` = 1","
      `id`= '{$id}'"
    );
  }

  public function updateAllToInactive() {
    $this->db->updatedb(
      $this->dbConection, "`template`","
      `active` = 0",
      "id = id"
    );
    $this->db->updatedb(
      $this->dbConection, "`template_2`","
      `active` = 0",
      "id = id"
    );

    return true;
  }

  public function update($data) {
    $query = $this->db->updatedb(
      $this->dbConection,  $this->table,"
      `title`='{$data['title']}',
      `main-color`='{$data['main-color']}',
      `secondary-color`='{$data['secondary-color']}',
      `main-text-color`='{$data['main-text-color']}',
      `secondary-text-color`='{$data['secondary-text-color']}'",
      "`user-id`='{$data['user-id']}'"
    );

    return $query;
  }

  public function ultimoId($table) {
    $result = $this->db->ultimoid($this->dbConection, $table);
    
    return $result;
  }

  public function deleteTemplate2($id) {
    $query = $this->db->deletedb( $this->dbConection,  $this->table, "`id`='{$id}'" );
    return $query;
  }

  public function deleteTemplate($id) {
    $query = $this->db->deletedb( $this->dbConection,  "`template`", "`id`='{$id}'" );
    return $query;
  }
  
}