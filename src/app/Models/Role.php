<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static whereSlug(string $ADMIN_ROLE)
 */
class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'slug'
    ];

    const USER_ROLE = 'user';
    const MODERATOR_ROLE = 'moderator';
    const ADMIN_ROLE = 'admin';

    /**
     * @return array
     */
    public static function getRoles() : array
    {
        return [
            self::USER_ROLE,
            self::MODERATOR_ROLE,
            self::ADMIN_ROLE,
        ];
    }

    /**
     * @param string $slug
     * @return Role|\Illuminate\Database\Eloquent\Builder
     */
    public static function getRoleBySlug(string $slug) : self
    {
        return self::query()->where('slug', $slug)->first();
    }
}
