<?php

namespace App;

use Spatie\Tags\Tag as SpatieTag;

class Tag extends SpatieTag
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
