<?php
// database/migrations/xxxx_xx_xx_add_image_to_animals_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToAnimalsTable extends Migration
{
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}