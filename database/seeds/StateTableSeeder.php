<?php

use Illuminate\Database\Seeder;
use App\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('state')->truncate();

        DB::table('state')->insert([
            [
                'country_code'=>'MAS',
                'code'=>'01',
                'name'=>'JOHOR',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'02',
                'name'=>'KEDAH',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'03',
                'name'=>'KELANTAN',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'04',
                'name'=>'MELAKA',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'05',
                'name'=>'NEGERI SEMBILAN',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'06',
                'name'=>'PAHANG',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'07',
                'name'=>'PULAU PINANG',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'08',
                'name'=>'PERAK',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'09',
                'name'=>'PERLIS',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'10',
                'name'=>'SELANGOR',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'11',
                'name'=>'TERENGGANU',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'12',
                'name'=>'SABAH',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'13',
                'name'=>'SARAWAK',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'14',
                'name'=>'W.P.(KL)',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'15',
                'name'=>'W.P.(LABUAN)',
                'status_id'=>'1'
            ],
            [
                'country_code'=>'MAS',
                'code'=>'16',
                'name'=>'W.P.(PUTRAJAYA)',
                'status_id'=>'1'
            ],
        ]);

        //enable foreign key check for this connection after running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }
}
