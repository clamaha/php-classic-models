<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.classless.min.css">
    <title>Workshop Classic Models</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/"><strong>Classic Models</strong></a></li>
            </ul>
            <ul>
                <?php if (!empty($_SESSION['user'])): ?>
                    Hello <?= $_SESSION['user']['username'] ?>!
                    <li><a href="/logout"><strong>Logout</strong></a></li>
                <?php else: ?>
                    <li><a href="/login"><strong>Login</strong></a></li>
                    <li><a href="/register"><button>Register</button></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>