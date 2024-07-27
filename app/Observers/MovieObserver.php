<?php

namespace App\Observers;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieObserver
{
    /**
     * Handle the Movie "created" event.
     */
    public function created(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "updated" event.
     */
    public function updated(Movie $movie): void
    {
        if ($movie->isDirty('thumbnail')) {
            Storage::disk('public')->delete($movie->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the Movie "deleted" event.
     */
    public function deleted(Movie $movie): void
    {
        if (!is_null($movie->thumbnail)) {
            Storage::disk('public')->delete($movie->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the Movie "restored" event.
     */
    public function restored(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "force deleted" event.
     */
    public function forceDeleted(Movie $movie): void
    {
        //
    }
}