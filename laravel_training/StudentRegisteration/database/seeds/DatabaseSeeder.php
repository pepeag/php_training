<?php

use App\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            "Laravel",
            "Javascript",
            "Ruby",
            "Android",
            "PHP",
            "C#"
        ];

        foreach($majors as $major){
            DB::table('majors')->insert([
                'name' => $major,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ]);
    }
}
}
