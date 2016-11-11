<?php
/**
*@author Jonathan Messias
*@since 15/10/16
**/

ini_set('display_errors',1);
error_reporting(E_ALL);

class DB {

    public function connect()
    {
        // return 2;
        $db = new mysqli( 'localhost', 'root', '123456', 'modelo_landingpage' );
        if ( $db->connect_errno > 0 ) {
            die( 'Não foi possível conectar ao banco de dados [' . $db->connect_error . ']' );
        } else {
            define( 'URL_DEFINITIVA', "http://localhost/modelo-landingpage/admin/" );
            return $db;
        }
    }

    public function disconnect( $db )
    {
        return $db->close();
    }

    public function selectdb( $connection, $fields, $table, $condition )
    {
        // return "SELECT {$fields} FROM {$table} WHERE {$condition};";
        return $connection->query( "SELECT {$fields} FROM {$table} WHERE {$condition};" );
    }

    public function objectdb( $sql )
    {
        // return $sql_kyara;
        return $sql->fetch_object();
    }

    public function insertdb( $connection, $table, $fields, $values )
    {
        // echo "INSERT INTO {$table} ({$fields}) VALUES ({$values})";die;
        return $connection->query( "INSERT INTO {$table} ({$fields}) VALUES ({$values});" );
    }

    public function updatedb( $connection, $table, $fields, $condition )
    {
        // return "UPDATE {$table} SET {$fields} WHERE {$condition};";die;
        return $connection->query( "UPDATE {$table} SET {$fields} WHERE {$condition};" );
    }

    public function deletedb( $connection, $table, $condition )
    {
        // return "DELETE FROM {$table} {$condition};";
        return $connection->query( "DELETE FROM {$table} WHERE {$condition};" );
    }

    public function ultimoid( $connection, $table ) {
        $sql = $connection->query( "SELECT `id` FROM {$table} ORDER BY `id` DESC LIMIT 0,1;" );
        $obj = $this->objectdb( $sql );
        return $obj->id;
    }

    public function msg( $msg, $type )
    {
        return "<div class='text-center alert alert-{$type}'>
                        {$msg}
                    </div>";
    }

    public function log( $connection, $user, $pass, $msg )
    {
        return $this->insertdb(
            $connection,
            "`log`",
            "`login`,`senha`,`status`,`data_horario`",
            "'{$user}','{$pass}','{$msg}',NOW()"
        );
    }

    public function uploadfile( $arquivo, $folder )
    {
        $ext = pathinfo( $arquivo['name'] );
        if ( $ext['extension'] == "jpg" || $ext['extension'] == "png" ) {
            $url = md5( uniqid( rand(), true ) ).".".$ext['extension'];
            $uploadfile = "userfiles/{$folder}/".$url;
            if ( move_uploaded_file( $arquivo['tmp_name'], $uploadfile ) ) {
                return $url;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



}