<?php

namespace App\Traits;

use App\Scopes\PublishScope;
use Illuminate\Database\Eloquent\Builder;

trait Publishable
{
    public static function bootPublishable()
    {
        static::addGlobalScope(new PublishScope);
    }

    public function getIsPublishedAttribute()
    {
        return $this->published_at->isPast();
    }

    public function scopeOrderByPublicationDate(Builder $query)
    {
        return $query->orderBy('published_at', 'desc');
    }
}
