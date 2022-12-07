<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Database\Seeders\CateogrySeeder;
use Database\Seeders\TaskSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /*  $this->call([
            UserSeeder::class,
            //TaskSeeder::class
        ]);
 */
        User::factory(20)->create();
        Category::factory(50)->create();
        Task::factory(10)->create();
    }
}
