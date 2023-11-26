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

        if (isset($_POST['add_user'])) {
            $Username = $_POST['Username'];

            if (empty($Username)) {
                $message[] = 'Please fill out all fields.';
            } else {
                $insert = "INSERT INTO users (Username) VALUES ('$Username')";
                $upload = mysqli_query($mysqli, $insert);
            }
        }
        ?>
        <div class="container">
            <form action="" method="post" class="form">

            <div class="form-title">
                <h2>Add User</h2>
            </div>

            <div class="form-field">
                    <div class="form-input">
                        <input type="text" class="box" name="Username" placeholder=" ">
                        <label for="CatName">Enter the username</label>
                    </div>
                        <button class="btn" type="submit" value="Add User" name="add_user">Add User</button>
                        <span class="divider">or</span>
                        <a href="index.php" class="back">Back</a>
                </div>
        </div>
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> CRUD Application</p>
    </footer>
</body>
</html>