<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag', function (Blueprint $table) {
           $table -> bigInteger('post_id') -> unsigned() -> index();
           $table -> foreign('post_id', 'post_tag_posts')
           -> references('id')
           -> on('posts');

            $table -> bigInteger('tag_id') -> unsigned() -> index();
           $table -> foreign('tag_id', 'post_tag_tags')
           -> references('id')
           -> on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tag', function (Blueprint $table) {
             $table ->dropForeign('post_tag_posts');
             $table ->dropForeign('post_tag_tags');

             $table -> dropColumn('post_id');
             $table -> dropColumn('tag_id');
        });
        
    }
}
