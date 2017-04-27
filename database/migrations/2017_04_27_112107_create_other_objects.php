<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('citation_styles')) {
            Schema::create('citation_styles', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('user_id');
                $table->string('name');
            });
        }

        if (!Schema::hasTable('resource_types')) {
            Schema::create('resource_types', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('citation_style_id');
                $table->string('name');
                $table->string('style_template');
            });
        }

        if (!Schema::hasTable('resource_components')) {
            Schema::create('resource_components', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('resource_type_id');
                $table->string('name');
                $table->string('data_type');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citation_styles');
        Schema::dropIfExists('resource_types');
        Schema::dropIfExists('resource_components');
    }
}
