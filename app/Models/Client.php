<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Client
 *
 * @property int $id
 * @property int|null $hotel_id
 * @property int|null $client_id
 * @property string $link
 * @property string $password
 * @property string $language
 * @property string $template
 * @property int $count_adults
 * @property int $count_children
 * @property int $count_toddlers
 * @property string $check_in
 * @property string $check_out
 * @property string $expiring_at
 * @property string|null $first_seen_at
 * @property string|null $last_seen_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Offer[] $offers
 * @property-read int|null $offers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Query\Builder|Client onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCheckIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCheckOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCountAdults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCountChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCountToddlers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereExpiringAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFirstSeenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereHotelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLastSeenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Client withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Client withoutTrashed()
 * @mixin \Eloquent
 */
class Client extends Model
{
    use SoftDeletes;

    protected $table = 'offers';

    protected $fillable = [
        'name',
        'client_id',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'client_id');
    }
}
