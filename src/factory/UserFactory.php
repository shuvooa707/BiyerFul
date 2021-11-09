<?php

namespace Biyerful\factory;

use Biyerful\models\User;
use Faker;



class UserFactory
{
    public function __construct()
    {
        $this->faker = Faker\Factory::create();
        $this->user = new User();
    }

    public function populate($n = 1)
    {
        for ($i=0; $i < $n; $i++) 
        { 
            $r = $this->user->create([
                "name" => $this->faker->name,
                "slug" => str_replace( " ", "-", $this->faker->name ),
                "gender" => ["male", "female"][random_int(0,1)],
                "age" => random_int(22,55),
                "email" => $this->faker->email,
                "image" => "1636212422.png",
                "username" => $this->faker->username,
                "password" => password_hash("abcd", PASSWORD_BCRYPT)
            ]);

            // dump($r);
        }
    }
}





?>