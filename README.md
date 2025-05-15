Tutor install


 php artisan tinker
 use Spatie\Permission\Models\Role;

$role = Role::create(['name' => 'admin']);
$user = \App\Models\User::where('email', 'admin1@gmail.com')->first();
$user->assignRole('admin');
$user->hasRole('admin');


import a.sql manuwal
