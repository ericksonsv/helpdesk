<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('department_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('birthday')->nullable();
            $table->timestamp('since')->nullable();
            $table->longText('avatar')->nullable();
            $table->string('email')->nullable();
            $table->string('position');
            $table->string('extension')->nullable();
            $table->string('mobile')->nullable();
            $table->string('skype')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('empployees');
    }
}
