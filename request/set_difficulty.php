<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['difficulty'])) {
        $_SESSION['trashItemsDifficulty'] = $_POST['difficulty'];
        echo json_encode(["status" => "success", "difficulty" => $_POST['difficulty']]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid request"]);
    }
?>