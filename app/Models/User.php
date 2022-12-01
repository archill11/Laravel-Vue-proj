<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable {
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function role() {
    return $this->belongsTo(Role::class);
  }

  public function tickets() {
    return $this->hasMany(Ticket::class);
  }

  public function hasAnyRole($roles) {
    if (!is_array($roles)) {
      $roles = [$roles];
    }
    foreach ($roles as $role) {
      if (strtolower($role) === strtolower($this->role->name)) {
        return true;
      }
    }
    return false;
  }

  const CACHE_TIMEOUT = 200;

  static public function getCacheUsersPage() {
    $key = static::class."UsersList"; 
    $result = Cache::get($key, false);

    if (!$result) {
      $result = User::get()->map(function (User $user) {
        return [
          'id' => $user->id,
          'name' => $user->name,
          'role' => $user->role->name,
        ];
      });

      Cache::put($key, $result, self::CACHE_TIMEOUT);
    }

    return $result;
  }
}
