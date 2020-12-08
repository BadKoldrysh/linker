<?php

namespace Infrastructure\Link\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property string $id
 * @property string $old_url
 * @property string $hash
 * @method static Builder|self whereHash(string $hash)
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

    public function scopeWhereHash(Builder $query, string $hash): Builder
    {
        return $query->where(['hash' => $hash]);
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
