<?php
declare(strict_types=1);

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property int $id;
 * @property int $user_id;
 * @property float $order_price;
 * @property Carbon $created_at;
 * @method isNotEmpty()
 */
class Order extends Model
{

}
