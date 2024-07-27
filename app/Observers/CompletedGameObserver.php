<?php

namespace App\Observers;

use App\Models\CompletedGame;
use Illuminate\Support\Facades\Storage;

class CompletedGameObserver
{
    /**
     * Handle the CompletedGame "created" event.
     */
    public function created(CompletedGame $completedGame): void
    {
        //
    }

    /**
     * Handle the CompletedGame "updated" event.
     */
    public function updated(CompletedGame $completedGame): void
    {
        if ($completedGame->isDirty('thumbnail')) {
            Storage::disk('public')->delete($completedGame->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the CompletedGame "deleted" event.
     */
    public function deleted(CompletedGame $completedGame): void
    {
        if (!is_null($completedGame->thumbnail)) {
            Storage::disk('public')->delete($completedGame->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the CompletedGame "restored" event.
     */
    public function restored(CompletedGame $completedGame): void
    {
        //
    }

    /**
     * Handle the CompletedGame "force deleted" event.
     */
    public function forceDeleted(CompletedGame $completedGame): void
    {
        //
    }
}