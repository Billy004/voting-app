<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVotesTableForUniqueUserVotes extends Migration
{
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->unique('user_id');
        });
    }

    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropUnique(['user_id']);
        });
    }
}