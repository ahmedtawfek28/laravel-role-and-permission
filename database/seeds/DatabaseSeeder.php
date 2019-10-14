<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Permissioncategory;
use App\Role;
use App\Admin;
use App\Customer;
use App\Post;
use App\Option;
use App\Localization;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ask for confirmation to refresh migration
        if ($this->command->confirm('Do you wish to refresh migration before seeding, Make sure it will clear all old data ?', true)) {
            $this->command->call('migrate:refresh');
            $this->command->warn("Data deleted, starting from fresh database.");
        }


        // Seed the default localization
        $options = [
            [ 'key' => 'website_name_ar','value'=>'تجريبي'],
            [ 'key' => 'website_name_en','value'=>'Demo'],
            [ 'key' => 'logo_image'],
            [ 'key' => 'facebook',],
            [ 'key' => 'twitter'],
            [ 'key' => 'google'],


        ];

        foreach ($options as $option) {
            Option::create($option);
        }
        // Seed the default localization
        $localizations = [
            [ 'key' => 'homepage','value_en'=>'Home','value_ar'=>'الرئيسية',],
            [ 'key' => 'aboutus','value_en'=>'About Us','value_ar'=>'عن البرنامج',],
            [ 'key' => 'test','value_en'=>'Testing','value_ar'=>'اختبار',],
            [ 'key' => 'middlename','value_en'=>'Middle Name','value_ar'=>'الاسم الاوسط',],
            [ 'key' => 'firstname','value_en'=>'First Name','value_ar'=>'الاسم الاول',],
            [ 'key' => 'contactus','value_en'=>'Contact Us','value_ar'=>'تواصل معنا',],
            [ 'key' => 'lastname','value_en'=>'Last Name','value_ar'=>'اسم العائلة',],

        ];

        foreach ($localizations as $localization) {
            Localization::create($localization);
        }
        // Seed the default permissions
        $permissions = $this->defaultPermissions();

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        // Seed the default Permissioncategory
        $cat_permissions = $this->defaultPermissioncategory();

        foreach ($cat_permissions as $cat_permission) {
            Permissioncategory::firstOrCreate(['name' => $cat_permission]);
        }
        $this->command->info('Default Permissions added.');

        // Ask to confirm to assign admin or user role
        if ($this->command->confirm('Create Roles for user, default is admin and user? [y|N]', true)) {

            // Ask for roles from input
            $roles = $this->command->ask('Enter roles in comma separate format.', 'Admin');

            // Explode roles
            $rolesArray = explode(',', $roles);

            // add roles
            foreach ($rolesArray as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if ($role->name == 'Admin') {
                    // assign all permissions to admin role
                    $role->permissions()->sync(Permission::all());
                    $this->command->info('Admin will have full rights');
                } else {
                    // for others, give access to view only
                    $role->permissions()->sync(Permission::where('name', 'LIKE', 'view_%')->get());
                }

                // create one user for each role
                $this->createUser($role);
            }

            $this->command->info('Roles ' . $roles . ' added successfully');

        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('By default, User role added.');
        }


    }

    /**
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = factory(Admin::class)->create();
        factory(Customer::class)->create();
        $user->assignRole($role->name);

        if ($role->name == 'Admin') {
            $this->command->info('Admin login details:');
            $this->command->warn('Username : ' . $user->email);
            $this->command->warn('Password : "123123123"');
        }

    }

    private function defaultPermissions()
    {
        return ['role-list', 'role-create', 'role-edit', 'role-delete', 'permission-list', 'permission-create', 'permission-edit', 'permission-delete', 'main-userManagement', 'main-dataManagement', 'permissioncategory-list', 'permissioncategory-create', 'permissioncategory-edit', 'permissioncategory-delete', 'product-list', 'product-create', 'product-update', 'product-delete', 'category-list', 'category-create', 'category-edit', 'category-delete', 'category-showdetails', 'subcategory-list', 'subcategory-create', 'subcategory-edit', 'subcategory-delete', 'subcategory-showdetails', 'user-list', 'user-create', 'user-edit', 'user-delete','main-site','option-list', 'option-create', 'option-edit', 'option-delete','localization-list', 'localization-create', 'localization-edit', 'localization-delete','adminlocalization-list', 'adminlocalization-create', 'adminlocalization-edit', 'adminlocalization-delete'];
    }

    private function defaultPermissioncategory()
    {
        return ['main', 'permissioncategory', 'permission', 'role', 'user', 'category', 'subcategory','option','localization','adminlocalization'];
    }


}
