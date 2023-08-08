<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "notification_text" => "lorem ipsum",
            "footer_text" => "lorem ipsum",
            "logo_img" => "#",
            "slider_one_img" => "#",
            "slider_two_img" => "#"
        ];
    }
}
