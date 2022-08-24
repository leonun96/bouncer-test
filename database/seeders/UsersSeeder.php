<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TipoUsers;

use Bouncer;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$owner = TipoUsers::create(['tipo' => 'Owner']); //
		$admin = TipoUsers::create(['tipo' => 'Admin']); //
		$guest = TipoUsers::create(['tipo' => 'User']); // DEFAULT para usuarios
		$usr1 = User::create([
			'name' => 'dueño',
			'email' => 'owner@system.cl',
			'password' => bcrypt('1q2w3e4r'),
		]);
		$usr2 = User::create([
			'name' => 'test',
			'email' => 'test@system.cl',
			'password' => bcrypt('1q2w3e4r'),
		]);
		$usr3 = User::create([
			'name' => 'guest',
			'email' => 'guest@system.cl',
			'password' => bcrypt('1q2w3e4r'),
		]);
		$usr1->tipo_users()->associate($owner)->save();
		$usr2->tipo_users()->associate($admin)->save();
		$usr3->tipo_users()->associate($guest)->save();
		/* ########## PARA BOUNCER, ROLES Y PERMISOS ########## */
		Bouncer::allow('owner')->everything();

		Bouncer::allow('admin')->everything();
		Bouncer::forbid('admin')->toManage(User::class);

		// Bouncer::allow('editor')->to('create', Post::class);
		// Bouncer::allow('editor')->toOwn(Post::class);
		/* ########## PARA BOUNCER, ROLES Y PERMISOS ########## */
		Bouncer::assign('owner')->to($usr1);
		Bouncer::assign('admin')->to($usr2);
	}
}










