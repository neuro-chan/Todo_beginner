<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Todo;

class TodoFactory extends Factory
{
    protected $model = Todo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tasks = [
            '買い物に行く',
            '掃除をする',
            '洗濯をする',
            'メールを返信する',
            '資料を作成する',
            '会議の準備をする',
            '報告書を提出する',
            '本を読む',
            '運動する',
            '料理をする',
        ];

        return [
            'content' => $this->faker->randomElement($tasks),
        ];
    }
}
