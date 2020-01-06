<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTypeOnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'user_type')) {
                $table->enum('user_type', ['recruiter', 'candidate', 'admin'])->default('candidate');
            }
            if (Schema::hasColumn('users', 'recruiter')) {
                $table->dropColumn('recruiter');
            }
            if (Schema::hasColumn('users', 'candidate')) {
                $table->dropColumn('candidate');
            };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');

            $table->boolean('candidate')->default(1);
            $table->boolean('recruiter')->default(0);
        });
    }
}
