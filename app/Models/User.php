<?php

namespace App\Models;

use App\Traits\GenerateSlug;
use App\Traits\GenerateUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use GenerateSlug, GenerateUuid, HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'password',
        'email',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set password hash.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
            get: fn ($value) => $value,
        );
    }

    /**
     * Generate slug from column.
     *
     * @return string
     */
    public function getSlugFromKey(): string
    {
        return 'username';
    }

    /**
     * Get the todos owned by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function todos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Todo::class);
    }
}
