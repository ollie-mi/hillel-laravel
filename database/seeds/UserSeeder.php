<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        factory(User::class, 200)->create()->each(static function (User $user) {
            $user->profile()->save(
                factory(UserProfile::class)->make()
            );
        });
    }
}
