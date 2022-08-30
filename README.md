1. Connect Database.
2. Run php artisan migrate:fresh --seed
3. Run php artisan db:seed --class=referencesSeeder
4. Run php artisan db:seed --class=settingsSeeder
5. Run php artisan key:generate  
6. Run php artisan serv
7. Open http://127.0.0.1:8000/api/salary
8. Run vendor/bin/phpunit
