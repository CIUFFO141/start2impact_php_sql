# Gestione Viaggi - README

Questo script PHP fornisce funzionalità per gestire un sistema di viaggi e paesi attraverso un database MySQL.

## Requisiti

- PHP 7 o versioni successive
- Server MySQL
- Estensione MySQLi abilitata in PHP

## Configurazione

Prima di utilizzare lo script, assicurati di configurare correttamente le informazioni del database nel file `index.php`:

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "start2impact_php_sql";

## Utilizzo
Lo script offre diverse funzioni per gestire i viaggi e i paesi. Puoi utilizzare le seguenti funzioni:

Inserimento di un nuovo paese:

Cancellazione di un paese:

Inserimento di un nuovo viaggio:

Modifica di un viaggio esistente:

Cancellazione di un viaggio:

Visualizzazione di tutti i viaggi:

Filtraggio dei viaggi per paese:

Filtraggio dei viaggi per numero di posti disponibili:

filtraViaggiPerPostiDisponibili(10);

Note
Assicurati che il server MySQL sia in esecuzione e che le credenziali fornite siano corrette.
Utilizza le funzioni di gestione del database con cautela, poiché possono influenzare direttamente il contenuto del database.
Per ulteriori informazioni sull'utilizzo delle funzioni, consulta il codice sorgente nel file script.php.




