<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Company; // Add the Company model
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
        // For other users, generate random data
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'status' => 0, // Default status is 0 (inactive)

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Custom state for generating an admin user.
     */
    public function superAdmin(): static
    {
        return $this->state([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => 1, // Admin role
            'password' => Hash::make('12345678'), // Admin password
            'status' => 1, // Admin is active by default
            'company_id' => null, // Admin doesn't have a company
        ]);
    }
    public function admin(): static
    {
        return $this->state([
            'role_id' => 2,
            'company_id' => null,
        ]);
    }

    /**
     * Custom state for generating a student user.
     */
    public function student(): static
    {
        return $this->state(function (array $attributes) {
            // Fetch a random company for each student
            $company = Company::inRandomOrder()->first();

            return [
                'role_id' => 3, // Assuming role_id for student is 3
                'company_id' => null
            ];
        });
    }

    /**
     * Custom state for generating a trainer user.
     */
    public function trainer(): static
    {
        return $this->state(function (array $attributes) {
            // Fetch a random company for each trainer
            $company = Company::inRandomOrder()->first();

            return [
                'role_id' => 4, // Assuming role_id for trainer is 4
                'company_id' => $company ? $company->id : null, // Assign a random company ID
            ];
        });
    }
}
