# Marktplatz & Bidding

## Projektbeschreibung

**Marktplatz & Bidding** ist ein Schulprojekt, das mit Laravel entwickelt wird.

Ziel des Projekts ist die Entwicklung einer webbasierten Marktplatz-Anwendung mit einem einfachen Bietsystem.

Benutzer sollen später eigene Produkte einstellen und einer Kategorie zuordnen können. Andere Benutzer können auf aktive Produkte bieten. Zu einem Produkt werden unter anderem der Startpreis, der aktuelle Preis, der Status und das Ende der Auktion gespeichert.

Nach Abschluss einer Auktion kann das erfolgreiche Gebot für die Erstellung einer Bestellung verwendet werden.

## Technologien

* PHP
* Laravel 11
* MySQL
* XAMPP
* Eloquent ORM
* Git
* GitHub
* Visual Studio Code

## Datenbank

Die Anwendung verwendet aktuell die folgenden Haupttabellen:

### Categories

Speichert die verfügbaren Produktkategorien.

Wichtige Felder:

* `name`
* `slug`
* `description`

### Products

Speichert die Produkte bzw. Angebote des Marktplatzes.

Wichtige Felder:

* `user_id`
* `category_id`
* `title`
* `description`
* `starting_price`
* `current_price`
* `image`
* `status`
* `ends_at`

Ein Produkt gehört zu einem Benutzer und einer Kategorie und kann mehrere Gebote besitzen.

### Bids

Speichert die Gebote der Benutzer.

Wichtige Felder:

* `user_id`
* `product_id`
* `amount`
* `is_winning`

Ein Gebot gehört zu einem Benutzer und einem Produkt.

### Orders

Speichert die später aus einer abgeschlossenen Auktion entstehenden Bestellungen.

Wichtige Felder:

* `user_id`
* `product_id`
* `bid_id`
* `total_amount`
* `status`

Eine Bestellung referenziert einen Benutzer, ein Produkt und das zugehörige Gebot.

## Aktueller Entwicklungsstand – 13.08.2026

Die grundlegende Projektstruktur wurde eingerichtet.

Bereits umgesetzt:

* Laravel-Projekt eingerichtet
* Git-Repository eingerichtet und mit GitHub verbunden
* MySQL-Datenbank `marktplatz` eingerichtet
* Migrationen für Categories, Products, Bids und Orders erstellt
* Fremdschlüssel und Beziehungen zwischen den Tabellen eingerichtet
* Migrationen erfolgreich getestet
* Models `Category`, `Product`, `Bid` und `Order` erstellt
* Fillable-Felder in den Models definiert
* Eloquent-Beziehungen zwischen den Models eingerichtet
* Resource Controller für Products, Categories, Bids und Orders erstellt
* Entwicklungsschritte über einzelne Git-Commits dokumentiert

Die Resource Controller sind aktuell noch in der Grundstruktur vorhanden. Die CRUD-Logik wird als nächster Schritt implementiert.

## Nächste Schritte

Als Nächstes werden die Controller schrittweise implementiert. Danach folgen die Routes und die Blade-Views für die Benutzeroberfläche.

Anschließend werden Validierung, Produktverwaltung, Gebotslogik und Bestellverwaltung umgesetzt.

## Projektstatus

**Aktuell: Datenmodell und Backend-Grundstruktur abgeschlossen – Implementierung der Controller beginnt.**
