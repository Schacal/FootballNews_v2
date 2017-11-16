<div class="artykul" xmlns="http://www.w3.org/1999/html">
    <h2 class="artykul">Panel logowania</h2>
    <p class="artykul">

    <form action="login_exe.html" method="POST">

        <?php
        if(isset($_SESSION['error']))
            echo '<p class="error">'.$_SESSION['error'].'</p>';
        unset ($_SESSION['error']);
        ?>

        Login: <br/> <input type="text" name="login"/><br/>
        Haslo: <br/> <input type="text" name="haslo"/><br/><br/>
        <input type="submit"  value="Log in"/>

    </form>
    </p>
</div>
