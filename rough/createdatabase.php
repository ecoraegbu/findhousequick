<?php
require_once 'Core/Init.php';
$database = Database::getInstance();
//$database->drop_database('findhousequick');
//$database->create_database("findhousequick");
$database->execute_sql_script('findhousequick', 'shop.sql');