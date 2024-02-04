# Installe les dépendances de développement
composer install --dev

# Exécute PHPUnit pour les tests unitaires
./vendor/bin/phpunit

# Exécute PHPStan pour l'analyse statique du code
./vendor/bin/phpstan analyse

# Exécute PHPCS pour la vérification des standards de codage
./vendor/bin/phpcs

# Exécute PHPCBF pour corriger automatiquement les erreurs de style de code
./vendor/bin/phpcbf
