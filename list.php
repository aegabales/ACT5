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
            $tasks = mysqli_query($mysqli, "SELECT * FROM tasks");
        ?>

            <table class="display-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach ($tasks as $task) :
                            $categoryId = $task['CatId'];
                            $userId = $task['UId'];
                            
                            $category = mysqli_query($mysqli, "SELECT * FROM categories WHERE CatId = $categoryId")->fetch_assoc();
                            $user = mysqli_query($mysqli, "SELECT * FROM users WHERE UId = $userId")->fetch_assoc();
                    ?>
                            <tr>
                                <td><?php echo $task['TId']; ?></td>
                                <td><?php echo $task['TaskName']; ?></td>
                                <td><?php echo $category['CatName']; ?></td>
                                <td><?php echo $user['Username']; ?></td>
                                <td>
                                    <a href="index.php?uri=edit&id=<?php echo $task['TId']; ?>">Edit</a>
                                    <a href="index.php?uri=delete&id=<?php echo $task['TId']; ?>">Delete</a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
            
            <div class="add">
                <a href="index.php?uri=create" class="task">Add New Task</a>
                <a href="category.php" class="cat">Add New Category</a>
                <a href="user.php" class="user">Add New User</a>
            </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> CRUD Application</p>
    </footer>
</body>
</html>