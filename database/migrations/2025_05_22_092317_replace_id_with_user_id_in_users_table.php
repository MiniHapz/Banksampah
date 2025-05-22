<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement('ALTER TABLE users DROP PRIMARY KEY, DROP COLUMN id');
        DB::statement('ALTER TABLE users MODIFY user_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE users ADD PRIMARY KEY(user_id)');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE users ADD COLUMN id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY');
        DB::statement('ALTER TABLE users DROP PRIMARY KEY, DROP COLUMN user_id');
        DB::statement('ALTER TABLE users ADD PRIMARY KEY(id)');
    }
};
