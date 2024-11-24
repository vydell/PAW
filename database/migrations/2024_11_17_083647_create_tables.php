<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Schema::create('notifications', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('users_id');
        //     $table->text('message');
        //     $table->boolean('seen');

        //     //$table->foreign('users_id')->references('id')->on('users');
        // });
        

        Schema::table('users_events', function (Blueprint $table) {
            // $table->increments('events_id');
            // $table->integer('users_id');
            // $table->boolean('reminder_set');
            // $table->boolean('checked_in');

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('events_id')->references('id')->on('events');
        });

        Schema::table('events', function (Blueprint $table) {
            // $table->increments('id');
            // $table->integer('organizers_id');
            // $table->string('judul');
            // $table->text('deskripsi');
            // $table->enum('jenis', ['lomba','seminar','bootcamp','talkshow']);
            // $table->dateTime('tanggal_mulai');
            // $table->string('lokasi');
            // $table->integer('slot');
            // $table->integer('slot_terisi');

            $table->foreign('organizers_id')->references('id')->on('organizers');
        });

        Schema::table('reminders', function (Blueprint $table) {
            // $table->increments('id');
            // $table->integer('users_id');
            // $table->text('events_id');
            // $table->dateTime('reminder_time');

            $table->foreign('users_id')->references('users_id')->on('users_events');
            $table->foreign('events_id')->references('events_id')->on('users_events');
        });

        Schema::table('event_checkins', function (Blueprint $table) {
            // $table->increments('id');
            // $table->integer('users_id');
            // $table->text('events_id');
            // $table->timestamp('checkin_at');

            $table->foreign('users_id')->references('users_id')->on('users_events');
            $table->foreign('events_id')->references('events_id')->on('users_events');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
