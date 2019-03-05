<?php Session::init(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Wypożyczalnia jachtów</title>
        <?php if (Session::get('loggedIn') == false):?>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css"/>
         <?php else: ?>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css"/>
         <?php endif; ?>
    </head>
    <body>
       <div class="topnav">
            <a class="main" href="<?php echo URL; ?>">Strona główna</a>
            <?php if (Session::get('loggedIn') == true):?>
                <a href="<?php echo URL; ?>editAccount">Edytuj konto</a>
                <a href="<?php echo URL; ?>dashboard/logout">Wyloguj</a>
                
            <?php else: ?>
            <a href="<?php echo URL; ?>login">Zaloguj</a>
            <a href="<?php echo URL; ?>register">Zarejestruj</a>
            <?php endif; ?>
        </div>

