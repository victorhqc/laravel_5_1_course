<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlatformMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('account', function(Blueprint $table) {
            $table->increments('id');
            $table->float('amount')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->nullableTimestamps();
            $table->softDeletes();
            $table->foreign('currency_id')
            ->references('id')->on('currency')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('movement', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->float('amount')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movement');
        Schema::drop('account');
        Schema::drop('currency');
    }
}
