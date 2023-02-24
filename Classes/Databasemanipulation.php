<?php
class DatabaseManipulation
{

    private $connection;
    /**
     * Constructs a new Database object.
     */
    public function __construct() {
        $this->connection = Database::getInstance();
    }



    /**
     * Creates a new database with the given name.
     *
     * @param string $db_name the name of the database to create
     */
    public function create_database($db_name) {
        // Check if the database already exists
        if (mysqli_select_db($this->connection, $db_name)) {
            // If the database already exists, print an error message and exit
            die("Error: Database '$db_name' already exists.\n");
        } else {
            // If the database does not exist, create it
            mysqli_query($this->connection, "CREATE DATABASE $db_name");
            echo "Successfully created database: $db_name\n";
        }
    }

    /**
     * Drops (deletes) the database with the given name.
     *
     * @param string $db_name the name of the database to drop
     */
    public function drop_database($db_name)
    {
        if (mysqli_query($this->connection, "DROP DATABASE $db_name")){
            echo "Successfully dropped database: $db_name\n";
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

        // Split the script into individual SQL commands
        $commands = explode(";", $sql_script);

        // Select the specified database
        mysqli_query($this->connection, "USE $db_name");

        // Execute each SQL command in the script
        foreach ($commands as $command) {
            if (!mysqli_query($this->connection, $command)) {
                // If any of the SQL commands fail to execute, print an error message and exit the program
                die("Error: Could not execute SQL command '$command': " . mysqli_error($this->connection) . "\n");
            }
        }
        echo "Successfully executed SQL script: $script_path\n";
    } else {
        // If the file is not readable, print an error message and exit the program
        die("Error: Cannot read SQL script file '$script_path'.\n");
    }
}
/**
 * Creates a new table with the given name and structure in the specified database.
 *
 * @param string $db_name the name of the database to create the table in
 * @param string $table_name the name of the table to create
 * @param string $table_structure the structure of the table, as an SQL `CREATE TABLE` statement
 */
public function create_table($db_name, $table_name, $table_structure) {
    // Select the specified database
    mysqli_query($this->connection, "USE $db_name");

    // Create the table
    mysqli_query($this->connection, $table_structure);
    echo "Successfully created table: $table_name\n";
}

/**
 * Drops the table with the given name in the specified database, if it exists.
 *
 * @param string $db_name the name of the database to drop the table from
 * @param string $table_name the name of the table to drop
 */
public function drop_table($db_name, $table_name) {
    // Select the specified database
    mysqli_query($this->connection, "USE $db_name");

    // Check if the table exists
    if (mysqli_num_rows(mysqli_query($this->connection, "SHOW TABLES LIKE '$table_name'")) == 1) {
        // If the table exists, drop it
        mysqli_query($this->connection, "DROP TABLE $table_name");
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
 * @param array $table_names an array of the names of the tables to drop
 */
public function drop_tables($db_name, $table_names) {
    // Select the specified database
    mysqli_query($this->connection, "USE $db_name");

    // Loop through the array of table names
    foreach ($table_names as $table_name) {
        // Check if the table exists
        if (mysqli_num_rows(mysqli_query($this->connection, "SHOW TABLES LIKE '$table_name'")) == 1) {
            // If the table exists, drop it
            mysqli_query($this->connection, "DROP TABLE $table_name");
            echo "Successfully dropped table: $table_name\n";
        } else {
            // If the table does not exist, print an error message
            echo "Error: Table '$table_name' does not exist.\n";
        }
    }
}


}