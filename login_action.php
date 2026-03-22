<?php
session_start();
include 'config.php';

/* Allow only POST request */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "error:Invalid Request";
    exit;
}

/* Get & sanitize input */
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

/* Empty check */
if ($email === '' || $password === '') {
    echo "error:All fields are required";
    exit;
}

/* Prepared statement */
$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

/* User found */
if ($result->num_rows === 1) {

    $row = $result->fetch_assoc();

    /* Verify password */
    if (password_verify($password, $row['password'])) {

        /* Store session */
        $_SESSION['user_id']  = $row['id'];
        $_SESSION['username'] = $row['username'];

        /* Regenerate session (security) */
        session_regenerate_id(true);

        echo "success:Login Successful";
        exit;

    } else {
        echo "error:Wrong Password";
        exit;
    }

} else {
    echo "error:User Not Found";
    exit;
}
?>
