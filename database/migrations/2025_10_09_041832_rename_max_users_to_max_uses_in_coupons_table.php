<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            if (!Schema::hasColumn('coupons', 'max_uses')) {
                $table->unsignedInteger('max_uses')->nullable()->after('valid_until');
            }
        });

        // Salin nilai lama ke kolom baru
        DB::table('coupons')->update([
            'max_uses' => DB::raw('`max_users`')
        ]);

        // Hapus kolom lama
        Schema::table('coupons', function (Blueprint $table) {
            if (Schema::hasColumn('coupons', 'max_users')) {
                $table->dropColumn('max_users');
            }
        });
    }

    public function down(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            if (!Schema::hasColumn('coupons', 'max_users')) {
                $table->unsignedInteger('max_users')->nullable()->after('valid_until');
            }
        });

        DB::table('coupons')->update([
            'max_users' => DB::raw('`max_uses`')
        ]);

        Schema::table('coupons', function (Blueprint $table) {
            if (Schema::hasColumn('coupons', 'max_uses')) {
                $table->dropColumn('max_uses');
            }
        });
    }
};
