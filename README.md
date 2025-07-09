# Datenanalyse von Nobel Daten

# Installation und Einrichtung in einer XAMPP-Umgebung

Folgen Sie diesen Schritten, um die SQL- und PHP-Dateien in einer XAMPP-Umgebung einzusetzen und zu installieren:


## Schritt 1: XAMPP installieren

Laden Sie XAMPP von der offiziellen Website herunter und installieren Sie es. 
Link: https://www.apachefriends.org/de/index.html


## Schritt 2: Datenbank einrichten

Starten Sie den Apache und MySQL Service über das XAMPP Control Panel.

Öffnen Sie phpMyAdmin, indem Sie `http://localhost/phpmyadmin/` in Ihrem Webbrowser eingeben.

Erstellen Sie eine neue Datenbank  und die Tabellen und befüllen Sie diese manuell oder importieren Sie die SQL-Datei über die Import-Funktion von phpMyAdmin.


## Schritt 3: PHP-Dateien kopieren

Kopieren Sie alle notwendigen PHP-Dateien in einen Unterordner des `htdocs` Verzeichnis Ihrer XAMPP-Installation. 

Normalerweise befindet sich dieses Verzeichnis unter `C:\xampp\htdocs\{Unterordner}` auf Windows-Maschinen.


## Schritt 4: Datenbankverbindung konfigurieren

Öffnen Sie die PHP-Datei, die die Datenbankverbindung herstellt, und aktualisieren Sie die Datenbankdetails entsprechend Ihrer XAMPP-Konfiguration. Normalerweise sind die Standardwerte wie folgt:

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";


## Schritt 5: Starten Sie die Anwendung

Öffnen Sie Ihren Webbrowser und geben Sie `http://localhost/{Unterordner}/` ein, gefolgt vom Namen der PHP Datei {name}.php. 

Dadurch wird Ihre Anwendung gestartet und Sie sollten die Startseite Ihrer Anwendung sehen.


## Schritt 6: Fehlerbehandlung

Sollten Probleme auftreten, überprüfen Sie die Fehlermeldungen, die möglicherweise in Ihrem Webbrowser oder in den Protokollen von XAMPP angezeigt werden. Stellen Sie sicher, dass die Datenbank korrekt eingerichtet ist und dass die Verbindungsdaten in den PHP-Dateien korrekt sind. Gehen Sie die Schritte erneut durch, um sicherzustellen, dass keine Schritte übersprungen wurden, und überprüfen Sie die Konfigurationseinstellungen in Ihren Dateien.
 
 
