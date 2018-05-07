<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * @var array
     */
    protected $table = 'topics';
    protected $fillable = ['id', 'title', 'category', 'content', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasUser()
    {
        return $this->hasOne(User::class);
    }
}