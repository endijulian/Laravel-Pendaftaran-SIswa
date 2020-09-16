<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;

    protected $table = 'posts';
    protected $date = ['created_at'];
    protected $fillable = ['title', 'content', 'thumbnail', 'slug', 'user_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        // if ($this->thumbnail) {
        //     return $this->thumbnail;
        // } else {
        //     return asset('thumbnail.png');
        // }


        // if (!$this->thumbnail) {
        //     return asset('thumbnail.png');
        // }
        // return $this->thumbnail;

        return !$this->thumbnail ? asset('thumbnail.png') : $this->thumbnail;
    }
}
