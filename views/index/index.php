<div class="element">
    <div class="photo">
        <img src="<?php echo URL; ?>public/img/hero-background.jpg" alt="background-photo" />
    </div>
    <div class="title">
        <h1> Znajdź jacht dla siebie: </h1>
         <?php if (Session::get('loggedIn') == false):?>
        <a href="<?php echo URL; ?>login"><button type="submit" name="rent" value="rent">Wypożycz</button></a>
        <?php else: ?>
        <a href="<?php echo URL; ?>dashboard"><button type="submit" name="rent" value="rent">Wypożycz</button></a>
        <?php endif; ?>
    </div>

