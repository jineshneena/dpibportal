<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $role=['ROLE_MANAGEMENT_ADMIN'];
       // $role=['ROLE_SALES_MANAGER'];
        $role=['ROLE_SALES'];
       // $role=['ROLE_FINANCE_MANAGER'];
       // $role=['ROLE_FINANCE'];
        //$role=['ROLE_OPERATION_MANAGER'];        
        //$role=['ROLE_OPERATION'];
        //$role=['ROLE_TECHNICAL_MANAGER'];
        //$role=['ROLE_TECHNICAL'];
        //$role=['CUSTOMER_MANAGER'];
        // User::create([
        //     'name'              =>'Duaa  Alhirabi',
        //     'email'             =>'d.alhirabi@dbroker.com.sa',
        //     'password'          =>Hash::make('12345678'),
        //     'remember_token'    =>str_random(10),
        //     'roles'             => $role,
        //     'user_type'         =>'user',
        //     'department'        =>'sales'
        //     ]);

        

        User::create([
            'name'              =>'Abdullah Alhumaidi',
            'email'             =>'a.alhumaidi@dbroker.com.sa',
            'password'          =>Hash::make('12345678'),
            'remember_token'    =>str_random(10),
            'roles'             => $role,
            'user_type'         =>'user',
            
           
            ]);
    }
}
