# Webflix

## Installation

Après avoir clôné le dépôt :

```bash
git clone ...
```

Vous installez Laravel avec Composer :

```bash
composer install
```

Vous créez un fichier `.env` :

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

On génère une clé s'il n'y en a pas :

```bash
php artisan key:generate
```

Pour la base de données, on configure bien le `.env` et on peut lancer les migrations (et le seeder) :

```bash
php artisan migrate
php artisan migrate:fresh --seed
```
