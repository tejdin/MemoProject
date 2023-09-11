<html>
<head></head>
<body>
<form name="form1" method="post" action="listePost.php">
    <input type="text" name="nbItems">
    <input type="submit" name="submit" value="Envoyer">
</form>
<?php



echo '<ul>';

for($i=1;$i<=$_POST['nbItems'];$i++)
{
    echo '<li> item ' . $i . '</li>';
}
echo '</ul>';

?>

</body>
</html>
