<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'account_no', 'about',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {

            // grouping query with where clause
            $q->where(function ($q) use ($search) {
                // applying search conditon
                $q->where('email', 'LIKE', "%{$search}%")
                    ->orwhere('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%")
                    ->orWhereRaw(
                        "CONCAT(first_name,' ',last_name) LIKE ?", ["%{$search}%"]
                    );
            });

        });
    }
}
