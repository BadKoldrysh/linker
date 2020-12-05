<?php

namespace Infrastructure\Link\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $old_url
 * @property string $hash
 */
class Link extends Model
{
    public function getId(): int
    {
        return $this->id;
    }

    public function getOldUrl(): string
    {
        return $this->old_url;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'old_url',
        'hash',
        'user_id',
    ];
}
