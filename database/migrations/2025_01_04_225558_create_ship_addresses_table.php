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
        Schema::create('ship_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Liên kết với bảng users
            $table->string('name');                 // Tên người nhận
            $table->string('phone');                // Số điện thoại
            $table->string('address');              // Số nhà, tên đường
            $table->string('ward')->nullable();     // Phường/Xã
            $table->string('district')->nullable(); // Quận/Huyện
            $table->string('city')->nullable();     // Tỉnh/Thành phố
            $table->string('postal_code')->nullable(); // Mã bưu điện
            $table->string('country')->default('Vietnam'); // Quốc gia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship_addresses');
    }
};
