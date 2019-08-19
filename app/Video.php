<?php

namespace App;

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['channel_id','unique_id','title','description','processed','video_id','video_filename','visibility','allow_votes','allow_comments','process_percentage', ];

    public function channel()
    {
        $this->belongsTo(Channel::class);
    }

    public function getRouteKey()
    {
        return 'unique_id';
    }
}
