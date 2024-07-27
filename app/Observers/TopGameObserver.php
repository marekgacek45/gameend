<?php

namespace App\Observers;

use App\Models\TopGame;
use Illuminate\Support\Facades\Storage;

class TopGameObserver
{
    /**
     * Handle the TopGame "created" event.
     */
    public function created(TopGame $topGame): void
    {
        //
    }

    /**
     * Handle the TopGame "updated" event.
     */
    public function updated(TopGame $topGame): void
    {
        if ($topGame->isDirty('thumbnail')) {
            Storage::disk('public')->delete($topGame->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the TopGame "deleted" event.
     */
    public function deleted(TopGame $topGame): void
    {
           if (!is_null($topGame->thumbnail)) {
            Storage::disk('public')->delete($topGame->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the TopGame "restored" event.
     */
    public function restored(TopGame $topGame): void
    {
        //
    }

    /**
     * Handle the TopGame "force deleted" event.
     */
    public function forceDeleted(TopGame $topGame): void
    {
        //
    }
}