<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'stylist_id',
        'service_id',
        'date',
        'start_flame',
        'end_flame',
    ];

    /**
     * リレーション: Reservationは1人のユーザーに属する
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * リレーション: Reservationは1人のスタイリストに属する
     */
    public function stylist()
    {
        return $this->belongsTo(Stylist::class);
    }

    /**
     * リレーション: Reservationは1つのサービスに属する
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
