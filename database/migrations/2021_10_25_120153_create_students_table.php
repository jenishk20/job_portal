<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('roll_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('primary_mail_id');
            $table->string('secondary_mail_id');
            $table->string('mobile_number');
            $table->string('per_10');
            $table->string('per_12');
            $table->string('degree');
            $table->string('branch');
            $table->string('year_of_graduation');
            $table->string('year_of_pg');
            $table->string('cumulative_gpa');
            $table->string('cumulative_percentage');
            $table->string('sem_1_spi');
            $table->string('sem_2_spi');
            $table->string('sem_3_spi');
            $table->string('sem_4_spi');
            $table->string('sem_5_spi');
            $table->string('sem_6_spi');

            $table->string('backlog');
            $table->string('active_backlog');
            $table->string('if_solved');
            $table->string('if_active');

            $table->string('linkedin');
            $table->string('facebook');
            $table->string('skype');
            $table->string('github');
            $table->string('resume');

            $table->string('terms');
            $table->string('status');

            $table->string('attempts');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
