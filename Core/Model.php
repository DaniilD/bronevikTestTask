<?php


namespace Core;


class Model
{
    private static $link;
    public $table;
    public $propertys = [];

    public function __construct()
    {
        if(!self::$link){ // если свойство не задано, то подключаемся
            self::$link = new \mysqli(DB_HOST,DB_USER,DB_PASS, DB_NAME);
            mysqli_query(self::$link, "SET NAMES 'utf8'");
        }

    }

    public static function find($id){
        $model = new static();
        $table = $model->table;
        $query = "SELECT * FROM ".$table." WHERE id = ".$id.";";
        $result = self::$link->query($query);
        $row = $result->fetch_assoc();
        foreach ($row as $key=>$value){
            $model->$key = $value;
        }
        return $model;
    }

    public static function all(){
        $model = new static();
        $table = $model->table;
        $query = "SELECT * FROM ".$table.";";
        $results = self::$link->query($query);
        $models = [];
        while($row = $results->fetch_assoc()){
            $model = new static();
            foreach($row as $key=>$value){
                $model->$key = $value;
            }
            $models[] = $model;
        }
        return $models;
    }

    public static function where($name, $value){
        $model = new static();
        $table = $model->table;
        $query = "SELECT * FROM ".$table." WHERE ".$name." = '".$value."';";
        $results = self::$link->query($query);
        $models = [];
        while($row = $results->fetch_assoc()){
            $model = new static();
            foreach($row as $key=>$value){
                $model->$key = $value;
            }
            $models[] = $model;
        }
        return $models;
    }

    public static function whereMany($data){
        $model = new static();
        $table = $model->table;
        $where_str = "";
        foreach ($data as $key=>$value){
            $where_str.= " ".$key." = '".$value."' AND";
        }
        $query = 'SELECT * FROM '.$table.' WHERE'.substr($where_str, 0, -3).";";
        //вынести в отдельную функцию!!!
        $results = self::$link->query($query);
        $models = [];
        while($row = $results->fetch_assoc()){
            $model = new static();
            foreach($row as $key=>$value){
                $model->$key = $value;
            }
            $models[] = $model;
        }
        return $models;
    }

    public function save(){
        $query = "";
        if ($this->isset()){
            $query = "UPDATE ".$this->table." SET";
            $up = "";
            foreach ($this->propertys as $key=>$value){
                $up.=" ".$key." = '".$this->$key."',";
            }
            $query.=substr($up, 0, -1)." WHERE id = ".$this->id.";";
        }else{
            $query = "INSERT INTO ".$this->table." ";
            $colums = "";
            $values = "";
            foreach ($this->propertys as $key=>$value){
                $colums.='`'.$key.'`, ';
                $values.='"'.$value.'", ';
            }

            $query.="( ".substr($colums, 0, -2).") VALUES ( ".substr($values, 0, -2).");";
        }

        $insert_row = self::$link->query($query);
        if($this->isset()) return;

        if ($insert_row){
            $this->id = self::$link->insert_id;
        }else{
            die('Error : ('. self::$link->errno .') '. self::$link->error);
        }
    }

    public function delete(){
        $query = "DELETE FROM ".$this->table." WHERE id = ".$this->id.";";
        $result = self::$link->query($query);
        if(!$result){
             //Добавить исключение
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        $this->propertys[$name] = $value;
    }

    private function isset(){
        if(isset($this->id)){
            $results = self::$link->query("SELECT COUNT(*) FROM ".$this->table." WHERE id = ".$this->id.";");
            $total = (int)$results->fetch_row()[0];
            if($total > 0){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }



}