<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = User::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    return [
      'name' => $this->faker->name,
      'email' => $this->faker->unique()->safeEmail,
      'email_verified_at' => now(),
      'password' => '2y$10$92IXUNpuh',
      'remember_token' => Str::random(10),
      'role_id' => function () {
        return Role::inRandomOrder()->first()->id;
      },
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  public function unverified() {
    return $this->state(function (array $attributes) {
      return [
        'email_verified_at' => null,
      ];
    });
  }

  public function admin() {
    return $this->state(function (array $attributes) {
      return [
        'role_id' => 1,
      ];
    });
  }

  public function client() {
    return $this->state(function (array $attributes) {
      return [
        'role_id' => 2,
      ];
    });
  }
}