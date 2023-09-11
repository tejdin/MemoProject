<?php
  session_start();

    if (isset($_SESSION['counter']))
    {
        $_SESSION['counter']++;
    }
    else
    {
        $_SESSION['counter'] = 1;
    }
    echo $_SESSION['counter'] ;

    echo '<form name="form1" method="post" action="resetcounter.php">
    <input type="submit" name="submit" value="Envoyer">
</form>';


