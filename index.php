<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "start2impact_php_sql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Inserimento di un nuovo paese
function inserisciPaese($nomePaese)
{
    global $conn;
    $sql = "INSERT INTO paesi (nome) VALUES ('$nomePaese')";
    if ($conn->query($sql) === TRUE) {
        return "Paese inserito correttamente";
    } else {
        return "Errore durante l'inserimento del paese: " . $conn->error;
    }
}

// Modifica di un paese esistente
function modificaPaese($id, $nuovoNome)
{
    global $conn;
    $sql = "UPDATE paesi SET nome='$nuovoNome' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Paese modificato correttamente";
    } else {
        return "Errore durante la modifica del paese: " . $conn->error;
    }
}

// Cancellazione di un paese
function cancellaPaese($id)
{
    global $conn;
    $sql = "DELETE FROM paesi WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Paese cancellato correttamente";
    } else {
        return "Errore durante la cancellazione del paese: " . $conn->error;
    }
}

// Inserimento di un nuovo viaggio
function inserisciViaggio($paesi, $postiDisponibili)
{
    global $conn;
    $paesiString = implode(",", $paesi);
    $sql = "INSERT INTO viaggi (paesi, posti_disponibili) VALUES ('$paesiString', $postiDisponibili)";
    if ($conn->query($sql) === TRUE) {
        return "Viaggio inserito correttamente";
    } else {
        return "Errore durante l'inserimento del viaggio: " . $conn->error;
    }
}

// Modifica di un viaggio esistente
function modificaViaggio($id, $paesi, $postiDisponibili)
{
    global $conn;
    $paesiString = implode(",", $paesi);
    $sql = "UPDATE viaggi SET paesi='$paesiString', posti_disponibili=$postiDisponibili WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Viaggio modificato correttamente";
    } else {
        return "Errore durante la modifica del viaggio: " . $conn->error;
    }
}

// Cancellazione di un viaggio
function cancellaViaggio($id)
{
    global $conn;
    $sql = "DELETE FROM viaggi WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Viaggio cancellato correttamente";
    } else {
        return "Errore durante la cancellazione del viaggio: " . $conn->error;
    }
}

// Visualizzazione di tutti i viaggi
function visualizzaViaggi()
{
    global $conn;
    $sql = "SELECT * FROM viaggi";
    $result = $conn->query($sql);
    $viaggi = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $viaggi[] = $row;
        }
    }
    return $viaggi;
}

// Filtraggio dei viaggi per paese
function filtraViaggiPerPaese($paese)
{
    global $conn;
    $sql = "SELECT * FROM viaggi WHERE FIND_IN_SET('$paese', paesi)";
    $result = $conn->query($sql);
    $viaggi = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $viaggi[] = $row;
        }
    }
    return $viaggi;
}

// Filtraggio dei viaggi per numero di posti disponibili
function filtraViaggiPerPostiDisponibili($posti)
{
    global $conn;
    $sql = "SELECT * FROM viaggi WHERE posti_disponibili >= $posti";
    $result = $conn->query($sql);
    $viaggi = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $viaggi[] = $row;
        }
    }
    return $viaggi;
}

// Esempio di utilizzo delle funzioni
echo inserisciPaese("Italia") . "<br>";
echo inserisciPaese("Francia") . "<br>";

echo inserisciViaggio(["Italia", "Francia"], 10) . "<br>";

echo visualizzaViaggi()[0]["paesi"] . "<br>";

echo modificaPaese(1, "Spagna") . "<br>";
echo cancellaPaese(2) . "<br>";

echo modificaViaggio(1, ["Italia", "Spagna"], 15) . "<br>";
echo cancellaViaggio(1) . "<br>";

echo json_encode(filtraViaggiPerPaese("Italia")) . "<br>";
echo json_encode(filtraViaggiPerPostiDisponibili(10)) . "<br>";

$conn->close();
