
    <div class="element">
        <div class="photo">
            <img src="<?php echo URL; ?>public/img/rent-boat-background.jpg" alt="background-photo" />
        </div>
        <div class="dashForm">
        <form action="dashboard/rentBoat" method="post">
            <table>
            <tr>
                <td class="dash">Model:</td>
                <td>
                    <select name="model">
                        <option value="akara" name="akara">Akara</option>
                        <option value="comet" name="comet">Comet 26 S</option>
                        <option value="delphia" name="delphia">Delphia 33MC</option>
                        <option value="mariner" name="mariner">Mariner 31</option>
                        <option value="sasanka" name="sasanka">Sasanka 620</option>     
                    </select>
                </td>
            </tr>
            <tr> 
                 <td class="dash">Port wypłynięcia:</td>
                <td>
                    <select name="port">
                        <option value="gizycko" name="gizycko">Giżycko</option>
                        <option value="mikolajki" name="mikolajki">Mikołajki</option>
                        <option value="sztynort" name="sztynort">Sztynort</option>   
                    </select>
                </td>
            </tr>
            <tr> 
                <td class="dash">Długość rejsu (dni):</td>
                <td><input type="number" name="cruiseLength" min="1" max="10" required/></td>
            </tr>
            <tr>
                <td colspan="2" class="dash">Podaj dane, na które chcesz złożyć zamówienie:</td>
            </tr>
            <tr> 
                <td class="dash">Imie:</td>
                <td><input type="text" name="name" required/></td>
            </tr>
            <tr> 
                <td class="dash">Nazwisko:</td>
                <td><input type="text" name="surname" required/></td>
            </tr>
            <tr> 
                <td class="dash">Email:</td>
                <td><input type="email" name="email" required/></td>
            </tr>
            <tr> 
                <td class="dash">Płatność:</td>
                <td>
                    <input type="radio" name="payment" value="eurocard" checked> <label>Eurocard</label>
                    <input type="radio" name="payment" value="visa"> <label>Visa</label>
                    <input type="radio" name="payment" value="transfer"> <label>Przelew</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><br><input type="submit" value="Wypożycz" name="register" /></td>
            </tr>
            </table>
        </form>
        </div>
         <?php if (Session::get('err') == true):?>
            <div class="hello"><p>Błędne dane zamówienia</p></div>
        <?php 
         unset($_SESSION['err']);
        elseif (Session::get('order') == true):?>
            <div class="hello">
                <p>Twoje zamówienie zostało zrealizowane!</p><br>
            </div>
        <?php
         unset($_SESSION['order']);
        else: ?>
        <div class="hello">
            <h1> Witaj użytkowniku!</h1><br>
            <p>Obok znajduje się formularz wypożyczenia jachtów</p>
            <p>Zaznacz opcje, które Cię interesują!</p>
        </div>
        <?php endif; ?>

