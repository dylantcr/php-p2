// calculator.js
/**
 * Voeg een waarde toe aan het display
 * @param {string} value De waarde die moet worden toegevoegd aan het display
 */
function appendToDisplay(value) {
    document.getElementById('display').value += value;
}

/**
 * Maak het display leeg
 */
function clearDisplay() {
    document.getElementById('display').value = '';
}

/**
 * Bereken de expressie in het display en toon het resultaat
 */
function calculate() {
    // Haal de expressie op uit het display
    const expression = document.getElementById('display').value;
    const rounding = document.getElementById('rounding').value || null;

    // Verstuur de expressie naar calculate.php voor verwerking
    fetch('calculate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ expression: expression, rounding: rounding }) // Zet de expressie en afronding om in JSON-formaat
    })
    .then(response => response.json()) // Parseer de JSON-reactie van de server
    .then(data => {
        // Controleer of de server een resultaat heeft teruggegeven
        if (data.result !== undefined) {
            // Toon het resultaat in het display
            document.getElementById('display').value = data.result;
            // Update de vorige berekeningen na een korte vertraging
            setTimeout(() => {
                window.location.reload();
            }, 2000); // 2 seconden vertraging
        } else {
            // Toon een foutmelding als de expressie ongeldig is
            alert('Ongeldige expressie');
        }
    });
}

/**
 * Bereken direct een functie met het huidige getal in het display
 * @param {string} func De functie die moet worden toegepast ('sqrt', 'modulo', etc.)
 */
function calculateImmediate(func) {
    let expression = document.getElementById('display').value;
    if (func === 'sqrt') {
        expression = `sqrt(${expression})`;
    }
    // Verstuur de expressie naar calculate.php voor verwerking
    fetch('calculate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ expression: expression, rounding: null }) // Zet de expressie om in JSON-formaat
    })
    .then(response => response.json()) // Parseer de JSON-reactie van de server
    .then(data => {
        // Controleer of de server een resultaat heeft teruggegeven
        if (data.result !== undefined) {
            // Toon het resultaat in het display
            document.getElementById('display').value = data.result;
            // Update de vorige berekeningen na een korte vertraging
            setTimeout(() => {
                window.location.reload();
            }, 2000); // 2 seconden vertraging
        } else {
            // Toon een foutmelding als de expressie ongeldig is
            alert('Ongeldige expressie');
        }
    });
}