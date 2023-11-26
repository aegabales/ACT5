<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Application</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="header-content">
            <h1>Task Application</h1>
        </div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="index.php?uri=create">Add Task</a>
        </nav>
    </header>

    <main>
        <?php
            include 'includes/db.php';

            if (isset($_GET['id'])) {
                $taskId = $_GET['id'];
                $task = getTaskById($mysqli, $taskId);
                if (!$task) {
                    echo 'Task not found';
                }
            }
        ?>

        <div class="container">
            <form action="index.php?uri=edit&id=<?php echo $taskId; ?>" class="form" method="post">

                <div class="form-title">
                    <h2>Edit Task</h2>
                </div>

                <div class="form-field">
                <div class="form-input">
                    <input type="text" name="TaskName" value="<?php echo $task['TaskName']; ?>" placeholder="" required>
                    <label for="task" >Enter task name</label>
                </div>

                <div class="form-select">
                    <div class="custom-select">
                    <select name="CatId">
                        <?php 
                            $categories = $mysqli->query('SELECT * FROM categories ORDER BY CatName ASC ');
                            if ($categories) {
                                while ($cat = $categories->fetch_object()) {
                                    $selected = ($cat->CatId == $task['CatId']) ? 'selected' : '';
                                    echo "<option value='{$cat->CatId}' $selected>{$cat->CatName}</option>";
                                }
                            }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="form-select">
                    <div class="custom-select">
                    <select name="UId">
                        <?php 
                            $users = $mysqli->query('SELECT * FROM users ORDER BY Username ASC ');
                            if ($users) {
                                while ($user = $users->fetch_object()) {
                                    $selected = ($user->UId == $task['UId']) ? 'selected' : '';
                                    echo "<option value='{$user->UId}' $selected>{$user->Username}</option>";
                                }
                            }
                        ?>
                    </select>
                    </div>
                </div>
                <button class="btn" type="submit" name="submit">Update</button>
                </div>
            </form>

<?php 
if (isset($_POST["submit"])) {
    $newTask = $_POST['TaskName'];
    updateTask($mysqli, $taskId, $newTask);

    $newCatId = $_POST['CatId'];
    updateCat($mysqli, $taskId, $newCatId);

    $newUserId = $_POST['UId'];
    updateUsers($mysqli, $taskId, $newUId);

    header('Location: index.php');
}
?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> CRUD Application</p>
    </footer>
</body>
</html>