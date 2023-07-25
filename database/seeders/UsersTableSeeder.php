<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 外部キー制約を無効化
        Schema::disableForeignKeyConstraints();

        // ユーザーレコードを全て削除
        DB::table('users')->truncate();

        // 新しいユーザーレコードを挿入
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'dummy@email.com',
            'password' => bcrypt('test1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 外部キー制約を有効化
        Schema::enableForeignKeyConstraints();
    }
}
