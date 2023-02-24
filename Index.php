<?php
require_once 'Core/Init.php';
Cookie::delete('steven');

$db = Database::getInstance();
$db->drop_database('findhousequick');
//$db->create_database('findhousequick');
//$db->drop_database('findhousequick');
//$db->execute_sql_script('findhousequick', 'shop.sql');