<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citation_styles', function ($t) {
            $t->foreign('user_id')
                ->references('id')->on('users');
        });

        Schema::table('resource_types', function ($t) {
            $t->foreign('user_id')
              ->references('id')->on('users');

            $t->foreign('citation_style_id')
                ->references('id')->on('citation_styles');
        });

        Schema::table('resource_components', function ($t) {
            $t->foreign('user_id')
              ->references('id')->on('users');

            $t->foreign('resource_type_id')
                ->references('id')->on('resource_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        dropForeignKeysByName('citation_styles', ['user_id']);
        dropForeignKeysByName('resource_types', ['user_id', 'citation_style_id']);
        dropForeignKeysByName('resource_components', ['user_id', 'resource_type_id']);
    }
}
