<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Casts\Uuid;

class FilesystemEntry extends Model
{
    use HasFactory;

    /**
     * Set the fillable fields0.
     */
    protected $fillable = [
        'user_id',
        'id',
        'parent',
        'type',
        'name'
    ];

    /**
     * The ID will be a new UUID(v4)
     * 
     * @var \Symfony\Component\Uid\Uuid $id
     */
    protected $id;

    /**
     * Assign the casts for the model
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'id' => Uuid::class,
        'parent' => Uuid::class
    ];


    /**
     * Assign the owner of the file entry
     * 
     * @todo Get the correct return type
     * 
     * @return
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
