<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call([
            StudentSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
        // day la noi su dung de tao du lieu mau
        // $student = [
        //     "name" => "Nguyen Tien Dat",
        //     "email" => "abcd@gmail.com",
        //     "address" => "so 9 Trinh Van Bo",
        //     "date_of_birth" => "2003-04-05",
        //     "created_at" =>date('Y-m-d H:i:s'),
        //     "updated_at" =>date('Y-m-d H:i:s'),
        // ];
    //     for ($i = 0; $i < 5; $i++) {
           
    //         $student['name'] = 'Sinh Viên:  ' . ($i + 1);
    //         $student['email'] = 'Email: ' . ($i + 1) . '@example.com';
            


    //         DB::table('studentss')->insert($student);
            
    // }
        

        // DB::table('studentss')->insert($student);

    }
}
