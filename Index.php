<?php
require_once 'Core/Init.php';
Cookie::delete('steven');

$db = Database::getInstance();
//$db->drop_database('findhousequick');
//$db->create_database('findhousequick');
// Assuming you have already created a PDO object named $db with the appropriate credentials

$table_name = "users";
$table_structure = "CREATE TABLE $table_name (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(30) NOT NULL
                    )";

//$db->create_table('findhousequick', $table_name, $table_structure);
$db->modify_table('findhousequick', "users", "ADD COLUMN payment INT");
$db->modify_table('findhousequick', "users", "ADD COLUMN story INT");
$db->modify_table('findhousequick', "users", "MODIFY COLUMN story VARCHAR(255)");
$db->insert('users',  array('name' =>'emmanuel bisi',));
$gift = $db->get('users',['id', '=', 2]);
print_r($gift);


//$db->drop_database('findhousequick');
//$db->execute_sql_script('findhousequick', 'shop.sql');