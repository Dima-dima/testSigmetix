<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use  HasFactory;

    protected $connection;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = getDataSource();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

}
