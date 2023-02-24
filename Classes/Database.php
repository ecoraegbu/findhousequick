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
    
    public function create_database($db_name) {
        // Check if the database already exists
        $stmt = $this->connection->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?");
        $stmt->execute([$db_name]);
        if ($stmt->fetch()) {
            // If the database already exists, print an error message and exit
            die("Error: Database '$db_name' already exists.\n");
        } else {
            // If the database does not exist, create it
            $this->connection->exec("CREATE DATABASE $db_name");
            echo "Successfully created database: $db_name\n";
        }
    }
    public function drop_database($db_name)
    {
        $sql = "DROP DATABASE $db_name";
        if(!$this->query($sql)->error()){
            echo "Successfully dropped database: $db_name\n";
            return true;
        }
        return false;
    }
/**
 * Executes the SQL script at the given file path on the specified database, if the file is readable.
 *
 * @param string $db_name the name of the database to execute the script on
 * @param string $script_path the file path of the SQL script to execute
 */
public function execute_sql_script($db_name, $script_path) {
    // Check if the file is readable
    if (is_readable($script_path)) {
        // Read the contents of the SQL script file
        $sql_script = file_get_contents($script_path);

        // Select the specified database
        $this->connection->exec("USE $db_name");

        // Prepare the SQL script for execution
        $stmt = $this->connection->prepare($sql_script);

        // Execute the SQL script
        if ($stmt->execute()) {
            echo "Successfully executed SQL script: $script_path\n";
        } else {
            // If the script fails to execute, print an error message and exit the program
            die("Error: Could not execute SQL script '$script_path': " . implode(", ", $stmt->errorInfo()) . "\n");
        }
    } else {
        // If the file is not readable, print an error message and exit the program
        die("Error: Cannot read SQL script file '$script_path'.\n");
    }
}


}