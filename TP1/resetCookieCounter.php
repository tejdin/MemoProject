<?php

setcookie('nbVisites', 0, time() + 365*24*3600, null, null, false, true);

header('location: counterCookies.php');




