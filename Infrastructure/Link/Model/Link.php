<?php

namespace Infrastructure\Link\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'old_url',
        'new_url',
        'user_id',
    ];
}
