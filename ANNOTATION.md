# Anotações

Criar virtualhost - https://github.com/RoverWire/virtualhost
http://larafood.especializati.local/


Permission denied ".../storage/logs/laravel.log could not be opened"
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
sudo service apache2 restart

obs: não funcionou com 775 somente com 777

Criar Pasta Models 
Adicionar model User.php na pasta
alterar o namespace em User.php e em config/auth onde chama User.php


Usando AdminLTE no projeto 
https://github.com/jeroennoten/Laravel-AdminLTE


Banco de dados
Ao criar o bd utilizar o charset: utf8mb4_unicode_ci
pois é o charset utilizado pelo laravel, para confirmar tem informando em config > database.php nas configurações do mysql

php artisan migrate:rollback

php artisan migrate:rollback --step=1

php artisan migrate



Alguns comandos do artisan:

php artisan make:model Models/Plan -m (Criando model Plan e sua migration)

php artisan migrate (Rodas todas as migrations que ainda não foram rodadas)

php artisan make:controller Admin/PlanController (Criando controller PlanController)

php artisan make:request StoreUpdatePlanRequest (Criando validação)

php artisan make:observer PlanObserver (cria um observer que serve pra automatizar algo seja antes, depois e durante um cadastro/atualização de uma entidade)

php artisan make:observer PlanObserver --model=Models/Plan (cria o observer já com a asocciação do model) 

php artisan cache:clear
php artisan route:clear 
php artisan config:clear
php artisan view:clear

php artisan make:migration create_module_permission_table (Criar migration)

php artisan make:seeder UsersSeeder (Criar seeder para popular registro no banco)
php artisan db:seed (rodar as seeds)

php artisan migrate:refresh (roolback e up das migrations)
php artisan migrate:fresh (dropa as tabelas e roda as migrations)

Algumas informações sobre o orm do laravel

Plan::all(); (retorna todos os planos)

Plan::paginate(1); (retorna planos paginados com 1 item por pagina, o default é 15)

Plan::latest()->paginate(1) (latest retorna do mais recente para o mais antigo com base no created_at,  praticamente um orderby desc)

Plan::find($id)

Plan::where('id', $id)->first();

existe um método chamado "WHEN" que testa a variável e aplica o procedimento caso for true:

$permissions = Permission::whereNotIn('permissions.id', function($query){
                                $query->select('permission_profile.permission_id');
                                $query->from('permission_profile');
                                $query->whereRaw("profile_id={$this->id}");
                            })->when($filter, function($query) use($filter){
                                $query->where('permissions.name','like',"%{$filter}%");
                            })->paginate();





algumas informações sobre blade 

$plans->links()  (Mostra a paginação)


Rotas 
php artisan route:list

Route::resource('plans', 'PlanController');

Rota resouce igual a :

// Route::get('plans', 'PlanController@index')->name('plans.index');
// Route::get('plans/create', 'PlanController@create')->name('plans.create');
// Route::post('plans', 'PlanController@store')->name('plans.store');
// Route::get('plans/{id}', 'PlanController@show')->name('plans.show');
// Route::get('plans/{id}/edit', 'PlanController@edit')->name('plans.edit');
// Route::put('plans/{id}', 'PlanController@update')->name('plans.update');
// Route::delete('plans/{id}', 'PlanController@destroy')->name('plans.destroy');


