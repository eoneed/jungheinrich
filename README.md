
# Prototyp

## Testing

   $ php phpunit.phar --bootstrap ./tests/bootstrap.php ./tests/
  
## Debug command  
   
   $ php bin/run.php -v register AK123456 VE123456789014 2016-06-23T08:00:00+00:00 2016-06-23T12:00:00+00:00

## Standard command
  
   $ php bin/run.php register AK123456 VE123456789014 2016-06-23T08:00:00+00:00 2016-06-23T12:00:00+00:00

---------------------------------------------------------------------------------------------------

# ISM-Online Bewerberaufgabe

Was ist ISM-Online:

    Jungheinrich ISM Online steht für Informationssystem für das Staplermanagement und ist ein
    ganzheitliches Flottenmanagement, mit dem Sie Ihre gesamte Flurförderzeugflotte unabhängig von
    Größe und Komplexität managen können. Das Jungheinrich-Flottenmanagement ermöglicht eine
    detaillierte Analyse Ihrer Gabelstapler – auch von Flurförderzeugen anderer Hersteller. Ihre
    Staplerflotte können Sie mit dem ISM Online Flottenmanagement auch international effizienter steuern
    und die Transparenz und Sicherheit Ihrer Flurförderzeugflotte im Lager steigern.

Motivation der Aufgabe:

    Damit eine detaillierte Analyse der Gabelstapler erfolgen kann bekommt das System Gabelstapler
    Daten zugeschickt. Die System-interne Kommunikations-Strecke soll kontinuierlich getestet werden
    können. Um es unabhängig von der Fahrzeug-Hardware testen zu können werden Simulatoren
    benötigt.

    Mit den simulierten Daten sollte ein Entwickler die vorhandenen, aber auch die zukünftigen,
    Schnittstellen testen können. Des Weiteren sollte ein Entwickler die Möglichkeit haben die
    nachfolgenden Verarbeitungsschritte, mit den generierten Daten, zu testen und Lasttests zu erstellen.

Aufgabe:

    In dieser Aufgabe soll ein Simulator für eine Einsatznachricht erstellt werden. Mit einer
    Einsatznachricht teilen die Gabelstapler dem System mit wann eine Fahrt begann und wann die Fahrt
    endete.

    Für die Erfüllung der Aufgabe ist kein Funktionsfähiger Code nötig, aber eine prototypische
    Implementierung – es reicht vollkommen aus wenn Code-Schnipsel übermittelt werden, welche Ihre
    Idee abbilden und prototypisch die UnitTests andeuten.

Struktur einer Einsatznachricht:

    Feld-Bezeichnung		| Typ 		| Mögliche Zeichen
    ------------------------+-----------+-----------------------------
    Gabelstapler-Nr. 		| String	| genau 8 Zeichen A-Z und 0-9
    Gabelstapler-Fahrer-ID 	| String	| genau 14 Zeichen A-Z und 0-9
    Start 					| DateTime 	| Datum und Uhrzeit
    Ende 					| DateTime 	| Datum und Uhrzeit

In dem Prototypen sollten nach Möglichkeit:
- zufällige und valide Einsatznachrichten erzeugt werden, für eine Gabelstapler -Nr.
- Daten in einer imaginären Datenbank gespeichert werden

Wir freuen uns auf Ihren Prototypen.

Mit freundlichen Grüßen
Das Entwickler Team von ISM-Online
