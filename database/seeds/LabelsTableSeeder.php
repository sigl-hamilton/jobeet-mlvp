<?php

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            ['name' => 'Laravel'],
            ['name' => 'VueJs'],
            ['name' => 'Communication'],
            ['name' => 'Consulting'],
            ['name' => 'Management'],
            ['name' => 'CMMI'],
            ['name' => 'ITIL Fondation'],
        ]);
    }
}
