<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table)
        {
            // identification
            $table->increments('id');
            $table->string('slug')->unique()->nullable();

            // elements
            $table->string('title');
            $table->text('body');
            $table->string('extension')->default('md'); // md, txt, ?

            // order of display
            $table->integer('ordering')->unsigned()->default(0);

            // belongs to
            $table->integer('project_id')->unsigned();
            $table->integer('folder_id')->unsigned()->nullable();

            // dropbox
            $table->string('location')->nullable();
            $table->string('rev')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table)
        {
            // identification
            $table->increments('id');

            // elements
            $table->string('name');

            // order of display
            $table->integer('ordering');

            // dropbox
            $table->string('location')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('folders', function (Blueprint $table)
        {
            // identification
            $table->increments('id');

            // elements
            $table->string('name');

            // belongs to
            $table->integer('project_id')->unsigned();
            $table->integer('folder_id')->unsigned()->nullable();

            // order of display
            $table->integer('ordering');

            // dropbox
            $table->string('location')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table)
        {
            // identification
            $table->increments('id');

            // elements
            $table->string('name');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('meta_data', function (Blueprint $table)
        {
            // identification
            $table->increments('id');

            // elements
            $table->string('name');
            $table->boolean('allow_multiple')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('pages_tags', function(Blueprint $table)
        {
            // identification
            $table->integer('page_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('meta_data_pages', function(Blueprint $table)
        {
            // identification
            $table->integer('page_id')->unsigned();
            $table->integer('meta_data_id')->unsigned();

            // elements
            $table->string('value');

            $table->softDeletes();
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
        Schema::drop('pages');
        Schema::drop('projects');
        Schema::drop('folders');
        Schema::drop('tags');
        Schema::drop('meta_data');

        Schema::drop('pages_tags');
        Schema::drop('meta_data_pages');
    }
}
