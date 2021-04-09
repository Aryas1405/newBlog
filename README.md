<h3>First Class</h3>
<ol>
<li>Environment set up PHP,Composer,Wamp/Xamp,VScode </li>
<li>Commands composer global require laravel/installer</li>
<li>composer create-project --prefer-dist laravel/laravel blog "6.*"</li>
<li>run= php artisan serve</li>
<li>set DB setting in .env file</li>
<li>auth setup <br>
composer require laravel/ui "^1.0" --dev

php artisan ui vue --auth</li>
<li>run migration for DB table= php artisan migrate</li>
<li> create category MVC by php artisan make:model Category -a</li>
<li>setup routes for urls and drsign .blade page in view</li>
<li>Complete Blog,Tag,Category with relation</li>
</ol>
<hr>
<h3>Topics to Cover</h3>
<ol>
<li>Select2 &#10004;</li>
<li>Auth Routes &#10004;</li>
<li>Server side validation &#10004;</li>
<li>Session &#10004;</li>
<li>Factory/Seeder &#10004;</li>
<li>Pagination &#10004;</li>
<li>Search &#10004;</li>
<li>Soft Delete &#10004;</li>
<li>Slug &#10004;</li>
<li>ImageIntervention &#10004;</li>
<li>SummerNote</li>
<li>Middleware</li>
<li>Laratrust &#10004;</li>
<li>Web Services &#10004;</li>
</ol>
<hr>
</ol>
<hr>
<h3>Lara-Trust Installation guide</h3>
<ol>
<li>command: composer require santigarcor/laratrust</li>
<li>command: php artisan vendor:publish --tag="laratrust"</li>
<li>commang: php artisan config:clear</li>
<li>command:php artisan laratrust:setup <br>
This will create Role and Permission Migration & Model in App/Model.<br>
Now, move these models to your existing model directory , which is App/.<br>
Also Replace 'App/Model/User','App/Model/Role' & 'App/Model/Permission' line to 'App/User','App/Role' & 'App/Permission'  resp. in all places.
</li>
<li>command: composer dump-autoload</li>
<li>command: php artisan migrate</li>
<h4>For seeder</h4>
<li>command: php artisan laratrust:seeder</li>
<li>command: php artisan vendor:publish --tag="laratrust-seeder"</li>
<li>command: composer dump-autoload</li>
<li>
In the database/seeds/DatabaseSeeder.php file you have to add this to the run method:
$this->call(LaratrustSeeder::class);</li>
<li>At last seed command for db<br>
command:php artisan db:seed
</li>
#now LaraTrust in configured with some dummy data<br>
# all we need to do is to create a user interface to manage Role/Permission
<li>Create C.R.U.D for Role and Permission</li>
<li>create User Role -index,edit-update</li>
<li>create Role Permission -index,edit-update</li>
<li>Don't forget to register relationship for all of them</li>
<li>All set!! use permission or role by: <br>
@role('role-name')
//
@endrole<br>
@permission('permission-name')
//
@endpermission
</li>
</ol>

