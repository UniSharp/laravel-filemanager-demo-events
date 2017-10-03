<?php

use Illuminate\Database\Seeder;
use App\User;
use App\FilePath;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'root',
            'email' => 'root@example.com',
            'password' => \Hash::make('root')
        ]);

        FilePath::create([
            'path' => '/photos/1/unisharp_logo.png',
        ]);
        FilePath::create([
            'path' => '/photos/1/unisharp_logo_full.png',
        ]);
        FilePath::create([
            'path' => '/photos/1/unisharp_logo_full.png',
        ]);

    }
}
