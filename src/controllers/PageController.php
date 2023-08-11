<?php

namespace Controllers;

class PageController
{
    public function page_404(): void
    {
        include 'views/layout/header.view.php';
        include 'views/404.view.php';
        include 'views/layout/footer.view.php';
    }

    public function page_500(string $errorMessage = ""): void
    {
        $error = $errorMessage;
        include 'views/layout/header.view.php';
        include 'views/500.view.php';
        include 'views/layout/footer.view.php';
    }
}