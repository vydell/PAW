<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organizer extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'password_2'];

    public function events()
    {
        return $this->hasMany(Event::class, 'organizers_id');
    }
}
