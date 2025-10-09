<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('journals', function (Blueprint $table) {
            $table->string('teacher_name')->nullable()->after('teacher_id');
            $table->string('subject_name')->nullable()->after('subject_id');
            $table->string('class_name')->nullable()->after('class_id');
        });

        // Backfill existing records
        if (class_exists(\App\Models\Journal::class)) {
            \App\Models\Journal::with(['teacher', 'subject', 'classRoom'])->chunk(100, function ($journals) {
                foreach ($journals as $journal) {
                    $journal->teacher_name = $journal->teacher?->name;
                    $journal->subject_name = $journal->subject?->name;
                    $journal->class_name = $journal->classRoom?->name;
                    $journal->save();
                }
            });
        }
    }

    public function down()
    {
        Schema::table('journals', function (Blueprint $table) {
            $table->dropColumn(['teacher_name', 'subject_name', 'class_name']);
        });
    }
};
