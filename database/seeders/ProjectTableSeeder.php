<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $table->string('name', 100);
        // $table->string('slug')->unique();
        // $table->string('client_name', 100);
        // $table->text('summary');
        // $table->string('cover_image');
        for ($i = 0; $i < 40; $i++) {
            $new_project = new Project();
            $new_project->name = $faker->sentence(3);
            $new_project->slug = Project::generateSlug($new_project->name);
            $new_project->client_name = $faker->sentence(3);
            $new_project->summary = $faker->paragraph(5);
            $new_project->save();
    }
}

}
