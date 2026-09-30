<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'user',
            'nis' => fake()->numerify('########'),
            'kelas' => fake()->randomElement([
                'X RPL 1', 'X RPL 2', 'X TKJ 1', 'X TKJ 2',
                'XI RPL 1', 'XI RPL 2', 'XI TKJ 1', 'XI TKJ 2',
                'XII RPL 1', 'XII RPL 2', 'XII TKJ 1', 'XII TKJ 2',
            ]),
            'rayon' => fake()->randomElement([
                'Ciawi 1', 'Ciawi 2', 'Ciawi 3',
                'Caringin 1', 'Caringin 2',
                'Cisarua 1', 'Cisarua 2',
            ]),
        ];
    }

    /**
     * State for user role (default, explicit).
     */
    public function user(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'user',
        ]);
    }

    /**
     * State for admin role.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'nis' => null,
            'kelas' => null,
            'rayon' => null,
        ]);
    }

    /**
     * State for counselor role.
     */
    public function counselor(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'counselor',
            'nis' => null,
            'kelas' => null,
            'rayon' => null,
        ]);
    }
}
