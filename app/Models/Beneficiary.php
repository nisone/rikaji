<?php

namespace App\Models;

use App\Mail\NeedStatusUpdated;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;

class Beneficiary extends Model
{
    /** @use HasFactory<\Database\Factories\BeneficiaryFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone_number',
        'support_need',
        'need_status',
        'email'
    ];
 /**
  * Get the user that owns the Beneficiary
  *

  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function user(): BelongsTo
 {
     return $this->belongsTo(User::class);
 }

 protected static function booted(): void
    {
        static::updated(function($beneficiary) {
            if($beneficiary->isDirty('need_status')){
                Mail::to($beneficiary)->send(new NeedStatusUpdated());

            }
        });
    }

    public static function search(string $search) : Builder {
        return self::where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%")
                    ->orWhere('support_need', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
    }
}
