<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
//    /**
//     * @var array
//     */
//    protected $table = 'topics';
//    protected $fillable = ['id', 'title', 'category', 'content', 'created_at', 'updated_at'];

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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasUser()
    {
        return $this->hasOne(User::class);
    }
}