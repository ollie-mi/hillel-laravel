<?php
declare(strict_types=1);

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
 * @method static inRandomOrder();
 * @method static create(array $user_data)
 * @method where(string $string, $value)
 *
 * @property Order $orders;
 */
class User extends Model
{

    protected $fillable = [
        'login',
        'password',
        'email'
    ];

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

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function orderListStr()
    {
        $str = '';

        $orderObj = $this->orders;

        if ($orderObj->isNotEmpty()) {
            foreach ($orderObj as $order) {
                $str .= $order->id . ', ';
            }
            $str = rtrim(trim($str), ',');
        } else {
            $str = 'No orders yet';
        }

        return $str;
    }
}
