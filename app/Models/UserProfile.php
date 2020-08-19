<?php
declare(strict_types=1);

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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

}
