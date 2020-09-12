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

