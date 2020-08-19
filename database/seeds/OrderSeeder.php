<?php

declare(strict_types=1);

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        factory(Order::class, 500)->create();
    }
}
