<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {

            if (!Schema::hasColumn('jobs', 'status')) {
                $table->enum('status', ['published', 'draft', 'archived'])
                      ->default('draft');
            }

            if (!Schema::hasColumn('jobs', 'posted_at')) {
                $table->timestamp('posted_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {

            if (Schema::hasColumn('jobs', 'status')) {
                $table->dropColumn('status');
            }

            if (Schema::hasColumn('jobs', 'posted_at')) {
                $table->dropColumn('posted_at');
            }
        });
    }
};
