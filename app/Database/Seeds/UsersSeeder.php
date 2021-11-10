<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id'               => '',
            	'email'            => 'tesGmail.com',
            	'username'         => 'cobavoba',
            	'password_hash'    => '7c222fb2927d828af22f592134e8932480637c0d',
            	'reset_hash'       => 'NULL',
            	'reset_at'         => 'NULL',
            	'reset_expires'    => 'NULL',
            	'activate_hash'    => 'NULL',
            	'status'           => 'NULL',
           	 	'status_message'   => 'NULL',
            	'active'           => '2',
            	'force_pass_reset' => 'NULL',
            	'created_at'       => Time::now(),
            	'updated_at'       => Time::now(),
            	'deleted_at'       => 'NULL',
			],
			[
				'id'               => '',
            	'email'            => 'tesaaGmail.com',
            	'username'         => 'cobaasavoba',
            	'password_hash'    => '7c222fb2927d828af22f592134e8932480637c0d',
            	'reset_hash'       => 'NULL',
            	'reset_at'         => 'NULL',
            	'reset_expires'    => 'NULL',
            	'activate_hash'    => 'NULL',
            	'status'           => 'NULL',
           	 	'status_message'   => 'NULL',
            	'active'           => '2',
            	'force_pass_reset' => 'NULL',
            	'created_at'       => Time::now(),
            	'updated_at'       => Time::now(),
            	'deleted_at'       => 'NULL',
			],
			
		];
		$this->db->table('users')->insertBatch($data);
	}
}
