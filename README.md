# Bedrijfsuitje App

Een Laravel-applicatie waarin collega’s kunnen stemmen op de bestemming voor het volgende bedrijfsuitje.

## Vereisten

-   PHP ≥ 8.x
-   Composer
-   Node.js en NPM
-   MySQL of MariaDB

## Installatie & Setup

Volg de onderstaande stappen:

1. **Repository klonen**

    ```bash
    git clone https://github.com/jouw-gebruikersnaam/bedrijfsuitje-app.git
    cd bedrijfsuitje-app
    ```

2. **PHP dependencies installeren**

    ```bash
    composer install
    ```

3. **JavaScript dependencies installeren**

    ```bash
    npm install
    ```

4. **Omgevingsvariabelen instellen**

    Kopieer het voorbeeldbestand:

    ```bash
    cp .env.example .env
    ```

    Pas in .env de databasegegevens en andere opties aan.

5. **Application key genereren**

    ```bash
    php artisan key:generate
    ```

6. **Database migraties en seeders uitvoeren**

    ```bash
    php artisan migrate --seed
    ```

7. **Ontwikkelservers starten**

    Start de backend server:

    ```bash
    php artisan serve
    ```

    Start de front-end build

    ```bash
    npm run dev
    ```

8. **Overige Informatie**

    Er is geen database dump toegevoegd, de rollen worden via een seeder gefeed aan de database. De rest is te beheren via de UI.
