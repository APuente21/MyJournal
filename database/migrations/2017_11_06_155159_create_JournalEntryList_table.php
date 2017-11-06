<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalEntryListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JournalEntryList', function (Blueprint $table) {
            $table->date('entry_date');
            $table->time('entry_time');
            $table->char('type', 1)->comment('D: Draft, F:Finished');
            $table->primary(['entry_date', 'entry_time']);
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
        Schema::dropIfExists('JournalEntryList');
    }
}
