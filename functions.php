<?php 

/*TASKS TABLE*/
function getAllTasks($mysqli) {
    $tasks = array();
    $query = "SELECT * FROM tasks";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }

        $stmt->close();
    }

    return $tasks;
}


function getTaskById($mysqli, $TId) {
    $query = "SELECT * FROM tasks WHERE Tid = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $TId);
        $stmt->execute();
        $result = $stmt->get_result();
        $task = $result->fetch_assoc();
        $stmt->close();
        return $task;
    }
    return null;
}

function createTask($mysqli, $TaskName) {
    $query = "INSERT INTO tasks (TaskName) VALUES (?)";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("s", $TaskName);
        $stmt->execute();
        $stmt->close();
    }
}

function updateTask($mysqli, $TId, $newTask) {
    $query = "UPDATE tasks SET TaskName = ? WHERE TId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("si", $newTask ,$TId);
        $stmt->execute();
        $stmt->close();
    }
}

function deleteTask($mysqli, $TId) {
    $query = "DELETE FROM tasks WHERE TId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $TId);
        $stmt->execute();
        $stmt->close();
    }
}

/*CATEGORIES TABLE*/
function getAllCat($mysqli) {
    $cat = array();
    $query = "SELECT * FROM categories";
    $result = $mysqli->query($query);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $cat[] = $row;
        }
    $result->free();
    }
    return $cat;
}

function getCatById($mysqli, $CatId) {
    $query = "SELECT * FROM categories WHERE CatId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $CatId);
        $stmt->execute();
        $result = $stmt->get_result();
        $cat = $result->fetch_assoc();
        $stmt->close();
        return $cat;
    }
    return null;
}

function createCat($mysqli, $CatName) {
    $query = "INSERT INTO categories (CatName) VALUES (?)";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("s", $CatName);
        $stmt->execute();
        $stmt->close();
    }
}

function updateCat($mysqli, $CatId, $newCat) {
    $query = "UPDATE categories SET CatName = ? WHERE CatId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("si", $newCat ,$CatId);
        $stmt->execute();
        $stmt->close();
    }
}

function deleteCat($mysqli, $CatId) {
    $query = "DELETE FROM categories WHERE CatId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $CatId);
        $stmt->execute();
        $stmt->close();
    }
}

/*USERS TABLE*/
function getAllUsers($mysqli) {
    $user = array();
    $query = "SELECT * FROM users";
    $result = $mysqli->query($query);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }
    $result->free();
    }
    return $user;
}

function getUsersById($mysqli, $UId) {
    $query = "SELECT * FROM users WHERE UId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $UId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }
    return null;
}

function createUsers($mysqli, $Username) {
    $query = "INSERT INTO users (Username) VALUES (?)";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $stmt->close();
    }
}
function updateUsers($mysqli, $UId, $newUsers) {
    $query = "UPDATE users SET Username = ? WHERE UId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("si", $newUsers ,$UId);
        $stmt->execute();
        $stmt->close();
    }
}

function deleteUsers($mysqli, $UId) {
    $query = "DELETE FROM users WHERE UId = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $UId);
        $stmt->execute();
        $stmt->close();
    }
}
?>