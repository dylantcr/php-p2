<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>prijs:   <input type="text" name="prijs" value=""></p>
        <p>korting: <input type="text" name="korting" value=""></p>

        <p><input type="submit" name="uitrekenen" value="uitrekenen"></p>
    </form>

    <?php
    
    //auteur: dylan mahn
    //functie: rekenen

    if (isset($_POST['uitrekenen']) == true) {
        
        echo "Bedrag inclusief" . $_POST['prijs'];
        echo "Bedrag inclusief" . $_POST['korting'];

        /*$uitkomst = $_POST['korting'] - $_POST['prijs'];

        $kortingsBedrag = $_POST['korting'] * ($_POST['prijs'] / 100);

        $uitkomst = $_POST['korting'] - $kortingBedrag;

        echo "Bedrag inclusief <br>" . $uitkomst;
        */

        $origineelBedrag = $_POST['prijs']; 
        $kortingPercentage = $_POST['korting'];

$eindBedrag = $_POST['uitrekenen']($origineelBedrag, $kortingPercentage);

// Toon het resultaat
echo "Oorspronkelijk bedrag: $" . number_format($origineelBedrag, 2) . "<br>";
echo "Kortingspercentage: " . $kortingPercentage . "%<br>";
echo "Eindbedrag inclusief korting: $" . number_format($eindBedrag, 2);

        
    }
    
    ?>
</body>
</html>