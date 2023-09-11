<html>
<head></head>
<body>
<?php



echo '<ul>';

for($i=1;$i<=$_GET['nbItems'];$i++)
{
    echo '<li> item ' . $i . '</li>';
}
echo '</ul>';

?>

</body>
</html>
