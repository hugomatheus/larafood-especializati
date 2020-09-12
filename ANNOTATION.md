Criar virtualhost - https://github.com/RoverWire/virtualhost
http://larafood.especializati.local/


Permission denied ".../storage/logs/laravel.log could not be opened"
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
sudo service apache2 restart

Criar Pasta Models 
Adicionar model User.php na pasta
alterar o namespace em User.php e em config/auth onde chama User.php


Usando AdminLTE no projeto 
https://github.com/jeroennoten/Laravel-AdminLTE


Banco de dados
Ao criar o bd utilizar o charset: utf8mb4_unicode_ci
pois é o charset utilizado pelo laravel, para confirmar tem informando em config > database.php nas configurações do mysql


Alguns comandos do artisan:

php artisan make:model Models/Plan -m (Criando model Plan e sua migration)

php artisan migrate (Rodas todas as migrations que ainda não foram rodadas)

php artisan make:controller Admin/PlanController (Criando controller PlanController)

