<?php
declare(strict_types=1);

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class User
 * @package App\Models
 * @property int $id;
 * @property string $login;
 * @property string $password;
 * @property string $email;
 * @property string $status;
 * @property Carbon $created_at;
 * @property Carbon $updated_at;
 * @property Carbon $deleted_at;
 *
 * @property UserProfile $profile;
 */
class User extends Model
{
    public function resolveRouteBinding($value, $field = null)
    {
        return $this
            ->where('id', $value)
            ->where('status', '=', 'ON')
            ->first();
    }

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }
}
