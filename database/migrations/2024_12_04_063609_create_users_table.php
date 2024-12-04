<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('U_Title');
        $table->string('U_FName');
        $table->string('U_LName');
        $table->string('U_Email')->unique();
        $table->string('U_Contact');
        $table->string('U_Designation');
        $table->tinyInteger('U_Type');
        $table->string('U_Password');
        $table->tinyInteger('U_Status')->default(0);
        $table->foreignId('U_Cratedby')->constrained('users');
        $table->timestamp('U_CratedDate');
        $table->string('u_Image');
        $table->tinyInteger('pw_status')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
