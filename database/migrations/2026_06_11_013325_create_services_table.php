<?php

use App\Models\ServiceCategory;
use App\Models\Shop;
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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shop::class,'shop_id')->constrained('shops')->cascadeOnDelete();
            $table->foreignIdFor(ServiceCategory::class, 'service_category_id')->constrained('service_categories')->cascadeOnDelete();
            $table->string('service_name');
            $table->text('service_desc')->nullable();
            $table->integer('service_duration_minutes');
            $table->decimal('service_price', 12, 2);
            $table->boolean('is_mobile_service')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
