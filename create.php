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

        if (isset($_POST['add_task'])) {
            $TaskName = $_POST['TaskName'];
            $CatId = $_POST['CatId'];
            $UId = $_POST['UId'];


            if (empty($TaskName) || empty($CatId) || empty($UId)) {
                $message[] = 'Please fill out all fields.';
            } else {
                $insert = "INSERT INTO tasks (TaskName, CatId, UId) VALUES ('$TaskName', '$CatId', '$UId')";
                $upload = mysqli_query($mysqli, $insert);
            }
        }
        ?>
<form action="index.php?uri=create" method="post" class="form">
    <div class="form-title">
        <h2>Create Task</h2>
    </div>

    <div class="form-field">
    <div class="form-input">
        <input type="text" name="TaskName" placeholder="" required>
        <label for="task" >Enter task name</label>
    </div>

    <div class="form-select">
        <div class="custom-select">
        <select name="CatId">
            <?php 
                $categories = $mysqli->query('SELECT * FROM categories ORDER BY CatName ASC ');
                if ($categories) {
                    while ($cat = $categories->fetch_object()) {
                        echo "<option value='{$cat->CatId}'>{$cat->CatName}</option>";
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
                        echo "<option value='{$user->UId}'>{$user->Username}</option>";
                    }
                }
            ?>
        </select>
        </div>
    </div>
    <button class="btn" type="submit" value="Add Task" name="add_task">Add Task</button>
    <span class="divider">or</span>
    <a href="index.php" class="back">Back</a>
    </div>
</form>

    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> CRUD Application</p>
    </footer>
</body>
</html>