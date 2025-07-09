<!DOCTYPE html>
<html>
<head>
    <style>

         /* CSS für Tabellen */
        table {
            width: 100%; /* Setzt die Breite auf 100% */
            border-collapse: collapse; /* Entfernt doppelte Ränder */
        }
        th, td {
            padding: 15px; /* Erhöht den Innenabstand */
            text-align: left; /* Textausrichtung links */
            border-bottom: 1px solid #ddd; /* Fügt eine untere Grenze hinzu */
        }
        tr:hover {background-color: #f5f5f5;} /* Fügt einen Hover-Effekt hinzu */

        /* CSS für Tabs */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Fügt einen Schatten hinzu */
            border-radius: 15px; /* Fügt abgerundete Ecken hinzu */
            width: 100%; /* Setzt die Breite auf 100% */
            height: 50px; /* Erhöht die Höhe */
        }
        .tab button {
            background-color: inherit;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            border-top-left-radius: 10px;  
            border-top-right-radius: 10px; 
            margin: 0 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Fügt einen Schatten hinzu */
        }
        .tab button:hover {
            background-color: #ddd;
        }
        .tab button.active {
            background-color: #ccc;
        }
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Fügt einen Schatten hinzu */
            border-radius: 15px; /* Fügt abgerundete Ecken hinzu */
            width: 100%; /* Setzt die Breite auf 100% */
        }
        /* CSS für Logout-Button */
        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        /* CSS für zentrierte Überschrift */
        h1 {
            text-align: center;
            color: #333; /* Ändert die Farbe der Überschrift */
            font-family: 'Arial', sans-serif; /* Ändert die Schriftart der Überschrift */
        }

    </style>
</head>
<body>

<h1>Willkommen zur Nobelpreisdatenbank</h1>

<div class="tab"> <!-- Kommentar: Erstellt den Container für die Tabs -->
  <button class="tablinks" onclick="openTab(event, 'Nobel')">Nobel</button> <!-- Kommentar: Erstellt den Tab "Nobel" und verknüpft ihn mit der JavaScript-Funktion openTab -->
  <button class="tablinks" onclick="openTab(event, 'Nobel-Analyse')">Nobel-Analyse</button> <!-- Kommentar: Erstellt den Tab "Nobel-Analyse" und verknüpft ihn mit der JavaScript-Funktion openTab -->
</div>

<div id="Nobel" class="tabcontent"> <!-- Kommentar: Erstellt den Inhalt für den Tab "Nobel" -->
  <h3>Nobel</h3>
  <?php
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "fallstudie";
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $db); // Kommentar: Verbindung zur Datenbank herstellen

  $sql = "SELECT * FROM nobel ORDER BY Year DESC, ID DESC"; // Kommentar: SQL-Abfrage, um die Daten aus der Tabelle "nobel" abzurufen und absteigend nach Jahr und dann nach ID zu sortieren
  $result = $conn->query($sql); // Kommentar: Ausführung der SQL-Abfrage

  if ($result->num_rows > 0) { // Kommentar: Überprüfen, ob Datensätze vorhanden sind
    echo "<table><tr><th>ID</th><th>Year</th><th>Category</th><th>Prize</th><th>Motivation</th><th>Prize Share</th><th>Laureate ID</th><th>Laureate Type</th><th>Full Name</th><th>Birth Date</th><th>Birth City</th><th>Birth Country</th><th>Sex</th><th>Organization Name</th><th>Organization City</th><th>Organization Country</th><th>Death Date</th><th>Death City</th><th>Death Country</th></tr>"; // Kommentar: Ausgabe der Tabellenüberschriften
    while($row = $result->fetch_assoc()) { // Kommentar: Schleife zum Durchlaufen der abgerufenen Datensätze
      echo "<tr><td>".$row["ID"]."</td><td>".$row["Year"]."</td><td>".$row["Category"]."</td><td>".$row["Prize"]."</td><td>".$row["Motivation"]."</td><td>".$row["Prize_Share"]."</td><td>".$row["Laureate_ID"]."</td><td>".$row["Laureate_Type"]."</td><td>".$row["Full_Name"]."</td><td>".$row["Birth_Date"]."</td><td>".$row["Birth_City"]."</td><td>".$row["Birth_Country"]."</td><td>".$row["Sex"]."</td><td>".$row["Organization_Name"]."</td><td>".$row["Organization_City"]."</td><td>".$row["Organization_Country"]."</td><td>".$row["Death_Date"]."</td><td>".$row["Death_City"]."</td><td>".$row["Death_Country"]."</td></tr>"; // Kommentar: Ausgabe der Datensätze in HTML-Tabellenzeilen
    }
    echo "</table>"; // Kommentar: Schließt die Tabelle
  } else {
    echo "0 results"; // Kommentar: Ausgabe, falls keine Datensätze gefunden wurden
  }
  ?>
</div>

<div id="Nobel-Analyse" class="tabcontent"> <!-- Kommentar: Erstellt den Inhalt für den Tab "Nobel-Analyse" -->
  <h3>Nobel-Analyse</h3>
  <?php
  $sql = "SELECT * FROM `nobel-analyse` ORDER BY Decade DESC"; // Kommentar: SQL-Abfrage, um die Daten aus der Tabelle "nobel-analyse" abzurufen und absteigend nach Jahrzehnt zu sortieren
  $result = $conn->query($sql); // Kommentar: Ausführung der SQL-Abfrage
  
  if ($result->num_rows > 0) { // Kommentar: Überprüfen, ob Datensätze vorhanden sind
      echo "<table><tr><th>Decade</th><th>Category</th><th>Percentage Female</th><th>Percentage Male</th><th>Average Age</th></tr>"; // Kommentar: Ausgabe der Tabellenüberschriften
      while($row = $result->fetch_assoc()) { // Kommentar: Schleife zum Durchlaufen der abgerufenen Datensätze
          echo "<tr><td>".$row["Decade"]."</td><td>".$row["Category"]."</td><td>".$row["Percentage_Female"]."</td><td>".$row["Percentage_Male"]."</td><td>".$row["Average_Age"]."</td></tr>"; // Kommentar: Ausgabe der Datensätze in HTML-Tabellenzeilen
      }
      echo "</table>"; // Kommentar: Schließt die Tabelle
  } else {
      echo "0 results"; // Kommentar: Ausgabe, falls keine Datensätze gefunden wurden
  }
  ?>
</div>

<button class="logout" onclick="location.href='index.php'">Logout</button> <!-- Kommentar: Erstellt den Logout-Button -->

<script>
function openTab(evt, tabName) { // Kommentar: JavaScript-Funktion, um den angeklickten Tab zu öffnen
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none"; // Kommentar: Blendet alle Tab-Inhalte aus
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", ""); // Kommentar: Entfernt die Klasse "active" von allen Tab-Buttons
  }
  document.getElementById(tabName).style.display = "block"; // Kommentar: Zeigt den angeklickten Tab-Inhalt an
  evt.currentTarget.className += " active"; // Kommentar: Fügt dem angeklickten Tab-Button die Klasse "active" hinzu

  document.querySelector('.tab').addEventListener('click', function(event) { // Kommentar: Event-Listener, um beim Klick auf den Tab-Container die Tabs auszublenden
        // Überprüfen, ob auf den Container selbst und nicht auf einen der Buttons geklickt wurde
        if (event.target === event.currentTarget) {
            // Alle .tabcontent Elemente ausblenden
            var tabcontent = document.getElementsByClassName("tabcontent");
            for (var i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            // Alle .tablinks Elemente als inaktiv markieren
            var tablinks = document.getElementsByClassName("tablinks");
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
        }
    });
    
}
</script>

</body>
</html>