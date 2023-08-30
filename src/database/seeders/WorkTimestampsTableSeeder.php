<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTimestampsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'started_at' => "2023-08-23 10:00:00",
            'ended_at' => "2023-08-23 18:00:00"
        ];
        DB::table('work_timestamps')->insert($param);
    }
}
