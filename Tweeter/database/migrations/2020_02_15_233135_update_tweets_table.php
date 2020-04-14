<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->string('orig_tweeter_name')->nullable();
            $table->timestamp('orig_created_at')->nullable();
            $table->string('tweet_photo')->nullable();
            $table->string('giphy_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropColumn('orig_tweeter_name');
            $table->dropColumn('orig_created_at');
        });
    }
}
