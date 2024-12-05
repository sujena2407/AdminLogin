<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('U_id'); // Auto-incrementing ID
            $table->string('U_Title', 10);
            $table->string('U_FName', 256);
            $table->string('U_LName', 256);
            $table->string('U_Email', 256)->unique(); // Adding unique constraint for emails
            $table->string('U_Contact', 50);
            $table->string('U_Designation', 256);
            $table->integer('U_Type');
            $table->string('U_Password', 256);
            $table->integer('U_Status')->default(0);
            $table->integer('U_Cratedby');
            $table->timestamp('U_CratedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('u_Image')->nullable();
            $table->integer('pw_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};