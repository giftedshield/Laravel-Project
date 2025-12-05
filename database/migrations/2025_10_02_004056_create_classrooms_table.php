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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
?>
<form action="{{ route('classrooms.store') }}" method="POST">
    @csrf
    <label>Name
      <input type="text" name="name" required />
    </label>

    <label>Grade
      <select name="grade" required>
        <option value="">-- Select Grade --</option>
        <option value="10 PPLG1">10 PPLG1</option>
        <option value="10 PPLG2">10 PPLG2</option>
        <option value="11 PPLG1">11 PPLG1</option>
        <option value="11 PPLG2">11 PPLG2</option>
      </select>
    </label>

    <button type="submit">Save</button>
</form>
