<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    public function definition()
    {
        return [
            //
            "last_name" => $this->faker->lastName,
            "first_name"=> $this->faker->firstName,
            "category_id"=>$this->faker->numberBetween(1,5),
            "gender"=>$this->faker->numberBetween(1,3),
            "email"=>$this->faker->safeEmail,
            "tel"=>$this->faker->numberBetween(1000000000,99999999999),
            "address"=>$this->faker->streetAddress,
            "building"=>$this->faker->secondaryAddress,
            "detail"=>$this->faker->realText(30)
        ];
    }
}
