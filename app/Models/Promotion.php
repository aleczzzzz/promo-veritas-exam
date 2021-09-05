<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "name",
        "slug",
        "description",
        "fields",
        "mechanic_id",
        "winning_moment_time",
    ];

    protected $dates = [
        'winning_moment_time'
    ];

    /**
     * Get all of the entrants for the Promotion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entrants(): HasMany
    {
        return $this->hasMany(Entrant::class, 'promotion_id', 'id');
    }

    public function getWinner($mechanic, $promotion)
    {
        //should be factory pattern creating a mechanic service
        if ($mechanic->name == 'Winning Moment') {
            $timeOfEntry = Carbon::now();

            if ($timeOfEntry->gte($promotion->winning_moment_time) && $promotion->entrants()->where('winner', 1)->count() == 0) 
            {
                return true;
            }
        } elseif ($mechanic->name == 'Chance / Probability') {
            $count = $promotion->entrants()->count();
            
            return $count % 5 == 0;
        } 

        return false;
    }
}
