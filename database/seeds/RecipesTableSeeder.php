<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$users = factory(App\Recipe::class, 10)->create();
	}
}
