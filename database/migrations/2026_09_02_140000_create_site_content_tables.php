<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('type')->default('text');
            $table->timestamps();
        });

        Schema::create('site_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->longText('body')->nullable();
            $table->timestamps();
        });

        Schema::create('work_items', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('category')->nullable();
            $table->string('client')->nullable();
            $table->string('role')->nullable();
            $table->string('text')->nullable();
            $table->string('image')->nullable();
            $table->string('result')->nullable();
            $table->longText('body')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('role');
            $table->string('context')->default('home')->after('avatar');
            $table->json('payload')->nullable()->after('context');
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'context', 'payload']);
        });

        Schema::dropIfExists('work_items');
        Schema::dropIfExists('site_pages');
        Schema::dropIfExists('site_settings');
    }
};
