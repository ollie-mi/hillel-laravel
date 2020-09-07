<?php
declare(strict_types=1);

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserProfile
 * @package App\Models
 * @property string $first_name;
 * @property string $last_name;
 * @property string $phone;
 * @property string $birthday;
 */
class UserProfile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'birthday'
    ];

    public $timestamps = false;

    public function userFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function birthdayFormat(): string
    {
        $dt = Carbon::parse($this->birthday);
        return $dt->format('d/m/Y');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
