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
                if($this->results !== false) {
                    $this->count = $this->query->rowCount();
                }else {
                    $this->count = 0;
                }
                
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
    public function actions($action, $table, $where = array()){

        $this->error = false;
        if(count($where) > 0){
            $operators = array('=','>','<','>=','<=','LIKE');
            $conditions = array();
            $values = array();
            
            foreach($where as $condition){
                if(count($condition) === 3){
                    $field    = $condition[0];
                    $operator = $condition[1];
                    $value    = $condition[2];
    
                    if(in_array($operator, $operators)){
                        $conditions[] = "{$field} {$operator} ?";
                        $values[] = $value;
                    }
                }
            }
    
            $sql = "{$action} FROM {$table} WHERE " . implode(" AND ", $conditions);
    
            if(!$this->query($sql, $values)->error()){
                return $this;
            }
        }
    
        return false;
    }
    

    public function get($table, $where){
        //$result = $this->action('SELECT *', $table, $where);
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
 * Creates a new table with the given name and structure in the specified database, if it does not already exist.
 *
 * @param string $table_name the name of the table to create
 * @param string $table_structure the structure of the table, as an SQL `CREATE TABLE` statement
 */
public function create_table($db_name, $table_name, $table_structure) {
    $this->connection->exec("USE $db_name");
    // Check if the table already exists
    $stmt = $this->connection->query("SHOW TABLES LIKE '$table_name'");
    if ($stmt->rowCount() > 0) {
        echo "Error: Table '$table_name' already exists.\n";
        return;
    }

    // Create the table
    $this->connection->exec($table_structure);
    echo "Successfully created table: $table_name\n";
}

/**
 * Drops the table with the given name in the specified database, if it exists.
 *
 * @param string $table_name the name of the table to drop
 */
public function drop_table($db_name, $table_name) {
    $this->connection->exec("USE $db_name");
    // Check if the table exists
    $stmt = $this->connection->prepare("SHOW TABLES LIKE ?");
    $stmt->execute([$table_name]);
    if ($stmt->rowCount() == 1) {
        // If the table exists, drop it
        $this->connection->exec("DROP TABLE $table_name");
        echo "Successfully dropped table: $table_name\n";
    } else {
        // If the table does not exist, print an error message
        echo "Error: Table '$table_name' does not exist.\n";
    }
}

/**
 * Drops the tables with the given names in the specified database, if they exist.
 *
 * @param string $db_name the name of the database to drop the tables from
 * @param array $table_names an array of table names to drop
 */
public function drop_tables($db_name, $table_names) {
    // Select the specified database
    $this->connection->exec("USE $db_name");

    // Loop through the array of table names
    foreach ($table_names as $table_name) {
        // Check if the table exists
        $stmt = $this->connection->query("SHOW TABLES LIKE '$table_name'");
        if ($stmt->rowCount() == 1) {
            // If the table exists, drop it
            $this->connection->exec("DROP TABLE $table_name");
            echo "Successfully dropped table: $table_name\n";
        } else {
            // If the table does not exist, print an error message
            echo "Error: Table '$table_name' does not exist.\n";
        }
    }
}


/**
 * Modifies the structure of the given table in the specified database.
 *
 * @param string $db_name the name of the database to modify the table in
 * @param string $table_name the name of the table to modify
 * @param string $table_structure the new structure of the table, as an SQL `ALTER TABLE` statement
 */
public function modify_table($db_name, $table_name, $table_structure) {
    // Select the specified database
    $this->connection->exec("USE $db_name");

    // Check if the table exists
    $stmt = $this->connection->query("SHOW TABLES LIKE '$table_name'");
    if ($stmt->rowCount() == 0) {
        echo "Error: Table '$table_name' does not exist.\n";
        return;
    }

    // Modify the table structure
    if($this->connection->exec($table_structure)){
        echo "Successfully modified table: $table_name\n";
    };
    
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
public function agent($query){
  
   if (!$this->query($query)->error()){
    return $this;

   }
    
}

}