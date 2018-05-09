<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * This method modify the field that route binding works with.
     * By default Route Binding works with 'id' field, but in this
     * case we've changed this value to 'slug'
     *
     * @return string The field that Route Binding works with.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    function isDraft(){
        return true;
    }
    public static function scopePublished($query) {
        return $query->where('status', 'published');
    }
}