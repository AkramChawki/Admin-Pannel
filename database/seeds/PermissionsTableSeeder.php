<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'client_access',
            ],
            [
                'id'    => '18',
                'title' => 'client_create',
            ],
            [
                'id'    => '19',
                'title' => 'client_delete',
            ],
            [
                'id'    => '20',
                'title' => 'client_edit',
            ],
            [
                'id'    => '21',
                'title' => 'client_show',
            ],
            [
                'id'    => '22',
                'title' => 'projet_access',
            ],
            [
                'id'    => '23',
                'title' => 'project_access',
            ],
            [
                'id'    => '24',
                'title' => 'project_create',
            ],
            [
                'id'    => '25',
                'title' => 'project_delete',
            ],
            [
                'id'    => '26',
                'title' => 'project_edit',
            ],
            [
                'id'    => '27',
                'title' => 'project_show',
            ],
            [
                'id'    => '28',
                'title' => 'tache_access',
            ],
            [
                'id'    => '29',
                'title' => 'task_access',
            ],
            [
                'id'    => '30',
                'title' => 'task_create',
            ],
            [
                'id'    => '31',
                'title' => 'task_delete',
            ],
            [
                'id'    => '32',
                'title' => 'task_edit',
            ],
            [
                'id'    => '33',
                'title' => 'task_show',
            ],
            [
                'id'    => '34',
                'title' => 'reminder_access',
            ],
            [
                'id'    => '35',
                'title' => 'reminder_create',
            ],
            [
                'id'    => '36',
                'title' => 'reminder_delete',
            ],
            [
                'id'    => '37',
                'title' => 'reminder_edit',
            ],
            [
                'id'    => '38',
                'title' => 'reminder_show',
            ],
            [
                'id'    => '39',
                'title' => 'reminder_access',
            ],
            [
                'id'    => '40',
                'title' => 'sage_access',
            ],
            [
                'id'    => '41',
                'title' => 'licence_access',
            ],
            [
                'id'    => '42',
                'title' => 'licence_create',
            ],
            [
                'id'    => '43',
                'title' => 'licence_delete',
            ],
            [
                'id'    => '44',
                'title' => 'licence_edit',
            ],
            [
                'id'    => '45',
                'title' => 'licence_show',
            ],
            [
                'id'    => '46',
                'title' => 'task_updateS',
            ],
            [
                'id'    => '47',
                'title' => 'reminder_updateS',
            ],

        ];

        Permission::insert($permissions);
    }
}
