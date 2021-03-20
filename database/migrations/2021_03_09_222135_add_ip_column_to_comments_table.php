<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpColumnToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->string('ip')->after('body')->nullable();
        });
        
        $comments =\App\Comment::withTrashed()->get();
        foreach($comments as $comment){
            $comment->ip = "127.0.0.1";
            $comment->save(); 
        }

        Schema::table('comments', function (Blueprint $table) {
            $table->string('ip')->nullable(false)->change();
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
            $table->dropColumn('ip');
        });
    }
}
