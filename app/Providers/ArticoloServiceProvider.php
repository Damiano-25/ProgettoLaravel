<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use App\Models\Articolo;
use App\Services\ArticoloService;

class ArticoloServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ArticoloService::class, function ($app) {
            return new ArticoloService();
        });
    }

    public function boot(): void
    {
        Articolo::creating(function ($articolo): void {
            Log::info("Creazione articolo: " . $articolo->titolo);
        });

        Articolo::created(function ($articolo): void {
            Log::info("Articolo creato con ID: " . $articolo->id);
        });

        Articolo::deleted(function ($articolo): void {
            Log::warning("Articolo eliminato con ID: " . $articolo->id);
        });
    }
}