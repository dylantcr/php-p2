<!DOCTYPE html> <!-- Dit definieert het document type en geeft aan dat het een HTML5-document is -->
<html lang="en"> <!-- Dit geeft aan dat de taal van de pagina Engels is -->
<head>
    <meta charset="UTF-8"> <!-- Dit specificeert de tekenset van het document als UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Dit definieert de viewport voor mobiele apparaten -->
    <title>Fietsenmaker Formulier</title> <!-- Dit is de titel van de pagina -->
</head>
<body>
 
<h2>Voeg Fiets Toe</h2> <!-- Dit is een kop met de tekst 'Voeg Fiets Toe' -->
 
<form action="Select.php" method="post"> <!-- Dit opent een formulier dat gegevens naar het bestand 'Select.php' verzendt met de HTTP-methode POST -->
    <label for="merk">Merk:</label> <!-- Dit is een label voor het invoerveld 'Merk' -->
    <input type="text" id="merk" name="merk" required><br> <!-- Dit is een invoerveld voor het merk van de fiets -->
 
    <label for="type">Type:</label> <!-- Dit is een label voor het invoerveld 'Type' -->
    <input type="text" id="type" name="type" required><br> <!-- Dit is een invoerveld voor het type van de fiets -->
 
    <label for="prijs">Prijs:</label> <!-- Dit is een label voor het invoerveld 'Prijs' -->
    <input type="number" id="prijs" name="prijs" required><br> <!-- Dit is een invoerveld voor de prijs van de fiets -->
 
    <input type="submit" value="Voeg Toe"> <!-- Dit is een knop om het formulier te verzenden -->
</form>
 
</body>
</html>