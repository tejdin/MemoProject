<?php
if(!isset($_COOKIE['nbVisites'])){

    setcookie('nbVisites', 1, time() + 365*24*3600, null, null, false, true);
    echo $_COOKIE['nbVisites'];

} else {

    $newVal = $_COOKIE['nbVisites'] + 1;
    setcookie('nbVisites', $newVal, time() + 365*24*3600, null, null, false, true);
    echo $_COOKIE['nbVisites'];
}

echo '<form name="form1" method="post" action="resetCookieCounter.php">
    <input type="submit" name="submit" value="Envoyer">
</form>';


