<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * @var array
     */
    protected $table = 'topics';

    protected $fillable = ['id', 'user_id', 'slug', 'title', 'category', 'content', 'created_at', 'updated_at'];

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

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    /**
     * @param User $user
     * @return bool
     */
    function isMine(User $user)
    {
        return $this->user_id === $user->id;
    }

    public function addReply($content)
    {
        $this->replies()->create([
            'content' => $content
        ]);
    }
}