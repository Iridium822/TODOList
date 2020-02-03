
<form class="form-signin" action="" method="post">

    <h1 class="h3 mb-3 font-weight-normal">Авторизация:</h1>

    <label for="inputLogin" class="sr-only">Логин</label>
    <input type="input" id="inputLogin" class="form-control" placeholder="Login" name="login" required autofocus>
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>


    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Войти" name="btn">
</form>


<?php extract($data); ?>
<?php if($login_status=="access_granted") { ?>
    <p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif($login_status=="access_denied") { ?>
    <p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } ?>