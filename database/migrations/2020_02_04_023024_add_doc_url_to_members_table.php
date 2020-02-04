<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocUrlToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('filename_id');
            $table->string('file_path_id');
            $table->string('image_path_id');
            $table->string('filename_ft');
            $table->string('file_path_ft');
            $table->string('image_path_ft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'filename_id',
                'file_path_id',
                'image_path_id',
                'filename_ft',
                'file_path_ft',
                'image_path_ft'
                ]);

        });
    }
}
