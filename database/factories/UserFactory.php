<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $first_name = fake()->firstName();
        $middle_name = fake()->lastName();
        $last_name = fake()->lastName();
        $fullname = "$first_name $middle_name $last_name";

        return [
            'firstname' => $first_name,
            'middlename' => $middle_name,
            'lastname' => $last_name,
            'fullname' => $fullname,
            'title' => 3,
            'designation' => 1,
            'ministry' => 0,
            'department' => 0,
            'directorate' => 0,
            'role_group' => 4,
            'levelA' => 0,
            'levelB' => 0,
            'levelC' => 0,
            'floc' => 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg',
            'filename' => 'FQldlziXsAIzlbe.jpeg',
            'ftype' => 'jpeg',
            'level' => 6,
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'availability' => 1,
            'disabled' => 0,
            'createdby' => 1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
