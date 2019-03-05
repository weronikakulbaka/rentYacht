
<div class="element">
    <div class="websiteForm">
        <form action="login/run" method="post">
            <table>
            <tr>
                <td>Login:</td>
                <td><input type="text" name="login" required/></td>
            </tr>
            <tr> 
                <td>Hasło:</td>
                <td><input type="password" name="password"  required/></td>
            </tr>
            <br>
            <tr>
                <td colspan="2"><input type="submit" value="Zaloguj" /></td>
            </tr>
            </table>
        </form>
         <?php if (Session::get('err') == true):?>
        <div class="error"><p>Błędny login lub hasło</p></div>
        <?php
        Session::destroy();
         endif; ?>
    </div>


