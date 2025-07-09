<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS-Styling */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        
        }
        input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Überschriften -->
    <h1>Willkommen zur Nobelpreisdatenbank</h1>
    <h2>Bitte loggen Sie sich an</h2>

    <?php
    // Datenbankverbindung herstellen
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "fallstudie";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    $error = ""; // Variable für Fehlermeldung initialisieren

    // Überprüfen, ob die Verbindung zur Datenbank fehlschlägt
    if ($conn->connect_error) {
        $error = "Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error;
    }  

    // Überprüfen, ob ein POST-Request vorliegt (also wenn das Formular abgeschickt wurde)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // SQL-Abfrage vorbereiten und ausführen
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Überprüfen, ob Benutzer gefunden und Passwort korrekt ist
        if ($user && $password === $user['password']) { 
            header("Location: view.php"); // Bei Erfolg weiterleiten
            exit;
        } else {
            $error = "Falscher Benutzername oder Passwort"; // Fehlermeldung setzen
        }
    }
    ?>

    <!-- Fehlermeldung anzeigen, falls vorhanden -->
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- Login-Formular -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Benutzername: <input type="text" name="username">
        Passwort: <input type="password" name="password">
        <input type="submit" value="LOGIN">
    </form>
</body>
</html>
