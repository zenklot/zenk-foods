<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nama_menu" => $this->faker->name(),
            "keterangan" => $this->faker->paragraph(),
            "harga"=>$this->faker->numberBetween(5000, 40000),
            "stok"=>'ready',
            "seller"=> 1 ,
            "kategori_menu"=> ($this->faker->numberBetween(0,1) == 1 ? "minuman" : "makanan"),
            "image" => "img/menu/nama.jpg"
        ];
    }
}
