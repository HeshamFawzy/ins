<?php

use Illuminate\Database\Seeder;

use App\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = 100;
        factory(Profile::class, $count)->create();
    }
}
