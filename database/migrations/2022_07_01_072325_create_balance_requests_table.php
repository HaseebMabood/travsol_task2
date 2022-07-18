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
        Schema::create('balance_requests', function (Blueprint $table) {
            $table->id();
            $table->string('req_amount');
            $table->string('balance_req_type');
            $table->string('agency_id');
            $table->string('admin_id');
            $table->string('agency_name');
            $table->string('admin_name');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('balance_requests');
    }
};