<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // استخدام Factory لإنشاء 20 سجلًا في جدول profiles

        Profile::factory(20)->create();
        /* إذا كنت تريد إنشاء سجل واحد يدويًا
        DB::table('profiles')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make(Str::random(40)),
            'bio' => Str::random(50),
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
        */
    }
}
