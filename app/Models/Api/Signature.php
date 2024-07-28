<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\SignatureFactory;

class Signature extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'signatures';

    /**
     * @return SignatureFactory|\Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return SignatureFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'register',
        'description',
        'price',
        'status'
    ];
}
