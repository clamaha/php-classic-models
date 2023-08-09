<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Workshop Classic Models</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/"><strong>Classic Models</strong></a></li>
            </ul>
            <ul>
                Hi <?= $_SESSION['user']['username'] ?>!
            <li><a href="/register.php"><strong><button>Register</button></strong></a></li>
            <li><a href="/login.php"><strong>Login</strong></a></li>
            <li><a href="/logout.php"><strong>Logout</strong></a></li>
            </ul>
        </nav>
    </header>
    <main>