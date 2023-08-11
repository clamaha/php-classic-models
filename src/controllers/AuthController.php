<?php
declare(strict_types=1);

namespace Controllers;

use Exception;
use Models\Database;

class AuthController
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register(string $usernameInput, string $emailInput, string $passwordInput)
    {
        if (empty($usernameInput) || empty($emailInput) || empty($passwordInput)) {
            throw new Exception('Incomplete form');
        }

        $username = htmlspecialchars($usernameInput);
        $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
        $passwordHash = password_hash($passwordInput, PASSWORD_DEFAULT);

        $this->db->query(
            "
                INSERT INTO users (username, email, password) 
                VALUES (?, ?, ?)
            ",
            [$username, $email, $passwordHash]
        );

        $_SESSION['user'] = [
            'id' => $this->db->lastInsertId(),
            'username' => $username,
            'email' => $email
        ];

        http_response_code(302);
        header('location: /');
    }

    public function showRegistrationForm()
    {
        include 'views/layout/header.view.php';
        include 'views/register.view.php';
        include 'views/layout/footer.view.php';
    }

    public function login(string $usernameInput, string $passwordInput)
    {
        if (empty($usernameInput) || empty($passwordInput)) {
            throw new Exception('Incomplete form');
        }

        $username = htmlspecialchars($usernameInput);

        $stmt = $this->db->query(
            "SELECT * FROM users WHERE username = ?",
            [$username]
        );

        $user = $stmt->fetch();

        if (empty($user)) {
            throw new Exception('Incorrect username');
        }

        if (password_verify($passwordInput, $user['password']) === false) {
            throw new Exception('Incorrect password');
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $username,
            'email' => $user['email']
        ];

        // Redirect to home page
        http_response_code(302);
        header('location: /');
    }

    public function showLoginForm()
    {
        include 'views/layout/header.view.php';
        include 'views/login.view.php';
        include 'views/layout/footer.view.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);
        http_response_code(302);
        header('location: /');
    }
}