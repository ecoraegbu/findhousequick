<?php
class Database{
    private static $instance = null;
    private $connection, 
    $query,
    $error = false, 
    $results , 
    $count = 0;

    private function __construct(){
        $host = DB_HOST;
        $dbname = DB_NAME;
        $username = DB_USER;
        $password = DB_PASSWORD;
        
        try{
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Database();

        }
        return self::$instance;
    }

    public function query($sql, $params = array()){
        $this->error = false;
        if($this->query = $this->connection->prepare($sql)){
            $x =1;
            if(count($params)){
                foreach($params as $param){
                   $this->query->bindValue($x, $param);
                    $x++;
                }
            }
            if($this->query->execute()){
                $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
                //print_r($this->_results);
                $this->count = $this->query->rowCount();
            }else{
                $this->error = true;
            }
        }
        return $this;
    }
    public function action($action, $table, $where = array()){ 
	if(count($where)===3){
        $operators = array('=','>','<','>=','<=');
        $field      = $where[0];
        $operator   = $where[1];
        $value      = $where[2];

        if(in_array($operator, $operators)){
                $sql ="{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if(!$this->query($sql, array($value))->error()){
                    return $this;
                }
             }
           }
    return false;
    }

    public function get($table, $where){
            return $this->action('SELECT *', $table, $where);
    }
    public function delete($table, $where){
            return $this->action('DELETE', $table, $where);
    }



    public function insert($table, $fields = array()){
        
            $keys = array_keys($fields);
            $values = '';
            $x = 1;
            foreach($fields as $field){
                $values .="?";
                if($x < count($fields)){
                        $values .=', ';
                }
                $x++;
            }
            $sql ="INSERT INTO {$table}(`". implode('`,`', $keys) ."`)VALUES({$values})";
			print_r($sql);
           if(!$this->query($sql, $fields)->error()){
                return true;
           
        }
        return false;
    }


    public function update($table,  $fields, $id){
            $set = '';
            $x = 1;
            
            foreach($fields as $name => $value){
                $set .="{$name} = ?";
                if($x < count($fields)){
                    $set .= ', ';
                }
                $x++;
            
            }
            $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
            if(!$this->query($sql, $fields)->error()){

            
                return true;
            
            }
            return false; 
    }
    public function results(){
        return $this->results;
    }
    public function first(){
        return $this->results()[0];
    }

    public function error(){
        return $this->error;
    }
    public function count(){
        return $this->count;
    }
}