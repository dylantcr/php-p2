<h1>Action Page</h1>

<?php
//test of verzend knop is ingedrukt.
if (isset($_POST['knop'])) {
    //print alle ingevulde velden van het formulier
    echo "Waarde van het invulveld: " . $_POST['invul1'] . "<br>";
}

?>