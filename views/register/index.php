
<div class="element">
 <div class="websiteForm">
        <form action="register/inputData" method="post">
            <table>
            <tr>
                <td>Login:</td>
                <td><input type="text" name="login" required/></td>
            </tr>
            <tr> 
                <td>Hasło:</td>
                <td><input type="password" name="password" required/></td>
            </tr>
            <tr> 
                <td>Imie:</td>
                <td><input type="text" name="name" required/></td>
            </tr>
            <tr> 
                <td>Nazwisko:</td>
                <td><input type="text" name="surname" required/></td>
            </tr>
            <tr> 
                <td>Email:</td>
                <td><input type="email" name="email" required/></td>
            </tr>
            <br>
            <tr>
                <td colspan="2"><input type="submit" value="Zarejestruj" name="register" /></td>
            </tr>
            </table>
        </form>
     <?php if (Session::get('err') == true):?>
        <div class ="error">Login nie może mieć przerw, hasło musi posiadac minimum 8 znaków!</div>
     <?php
        Session::destroy();
     endif; ?>
    </div>


