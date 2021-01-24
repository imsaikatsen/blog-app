<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameOnPostInCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('on_post');
            $table->dropColumn('from_user');

            $table->integer('post_id')->after('id')->unsigned();
            $table->integer('created_by')->after('body')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('on_post');
            $table->unsignedBigInteger('from_user');

            $table->dropColumn('post_id');
            $table->dropColumn('created_by');
        });
    }
}
