# BasicFit Laravel Website

Dit project is een Laravelproject met dynamische functionaliteiten zoals inloggen, profielbeheer, databasefunctionaliteiten en meer.

## Benodigdheden
- PHP (versie 8.x of hoger)
- Composer (voor PHP-pakketten)
- Node.js en NPM (voor frontend dependencies)
- SQLite (standaard database)

## Stappen om het project te laten werken

### 1. Installeer Composer en NPM dependencies
Indien Composer en NPM nog niet zijn geïnstalleerd, voer dan de volgende commando's uit:
```bash
composer install
npm install

cd Basicfitfolder
cd basicfit
code .    # Hiermee wordt de code geopend in Visual Studio Code
```

### 2. Database configureren
Controleer of de volgende instellingen in je `.env`-bestand aanwezig zijn:
```env
DB_CONNECTION=sqlite    
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

### 3. Migraties en seeders uitvoeren
Voer het volgende commando uit om de database te initialiseren:
```bash
php artisan migrate:fresh --seed
```

### 4. Start de server
Start de Laravel server:
```bash
php artisan serve
```
Bezoek nu de website op: [http://127.0.0.1:8000]

Gebruik de volgende gegevens om direct in te loggen als admin:
- **E-mail**: admin@ehb.be
- **Wachtwoord**: Password!321

