<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //prendo tutti i progetti e li ciclo
        //ad ogni ciclo estraggo un id random della tabella types
        //faccio l'update del post del ciclo con l'id del type
        $projects = Project::all();
        foreach ($projects as $project) {
            $type_id = Type::inRandomOrder()->first()->id;
            $project->type_id = $type_id;
            $project->update();
        }
    }
}
