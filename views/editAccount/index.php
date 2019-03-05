<div class="element">
    <div class="websiteForm">
        <form action="editAccount/run" method="post">
            <table>
            <tr>
                <td colspan="2"><br>Poniżej wpisz NOWE hasło, pamiętaj, nowe hasło musi mieć minimum 8 znaków:</td>
            </tr>
            <tr>
                <td>Nowe hasło:</td>
                <td><input type="password" name="newPassword" required/></td>
            </tr>
            <tr> 
                <td colspan="2"><br>Dla potwierdzenia zmian musisz wpisać swoje stare hasło poniżej:</td>
            </tr>
                <td>Stare hasło:</td>
                <td><input type="password" name="password"  required/></td>
            </tr>
            <br>
            <tr>
                <td colspan="2"><br><input type="submit" value="Zmień" /></td>
            </tr>
            </table>
        </form>
        <?php if (Session::get('err') == true):?>
        <div class="error"><p>Nie możesz zmienić hasła! Błędne dane</p></div>
        <?php 
        Session::destroy();
        Session::init();
        Session::set('loggedIn', true);
         elseif(Session::get('editPass') == true):?>
        <div class="error"><p>Hasło zostało zmienione!</p></div>
        <?php 
        Session::destroy();
        Session::init();
        Session::set('loggedIn', true);
        endif;
        ?>
    </div>


