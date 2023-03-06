<?php
require_once 'core/init.php';

$user = new User();
$user->logout();

redirect::to('findhousequick/index.php');