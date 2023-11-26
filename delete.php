<?php 
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    deleteTask($mysqli, $taskId);
    header('Location: index.php');
} else {
    echo 'Task ID is missing';
}
?>