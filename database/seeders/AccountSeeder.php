<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', 'kominfo.lambar@gmail.com')->get()->isEmpty()) {
            $user = new User();
            $user->name = 'kominfo';
            $user->nama_lengkap = 'Diskominfo Lampung Barat';
            $user->email = 'kominfo.lambar@gmail.com';
            $user->password = Hash::make('kominfo123');
            $user->level = 1;

            $user->save();
        }
    }
}
