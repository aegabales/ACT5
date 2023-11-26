<?php 
if (!isset($_SESSION['query_log'])) {
    $_SESSION['query_log'] = array();
}

include 'includes/db.php';
include 'includes/functions.php';

$requestedUri = isset($_GET['uri']) ? $_GET['uri'] : '';

switch ($requestedUri) {
    case 'create':
        include 'create.php';
        break;
    case 'edit':
        include 'edit.php';
        break;
    case 'delete':
        include 'delete.php';
        break;
    default:
    $tasks = getAllTasks($mysqli);
    $category = getAllCat($mysqli);
    $user = getAllUsers($mysqli);
    include 'list.php';
    break;
}
?>