<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->enum('job_type', ['permanent', 'temporary', 'contract', 'internship'])->default('permanent');
            $table->enum('duration', ['l6m', 'm6m', 'p'])->default('p'); // l6m = less than 6 months, m6m = more than 6 months, p = permanent
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['job_type', 'duration']);
        });
    }
}
