<?php
require_once('Core/Init.php');
$conn = Database::getInstance();
$conn->execute_sql_script('findhousequick', 'tenants.sql');
?>