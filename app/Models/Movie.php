<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;


    protected $casts = [
        'released_at' => 'date',
    ];

    //requête qui définit la relation en movies et categories
    //En PHP => SELECT*FROM movies m INNER JOIN categories c ON c.id = m.category_id;

    public function category()
    {
        return $this->belongsto(Category::class);
    }
        
    public function duration()
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;
        if ($minutes <10) {
            $minutes = '0'.$minutes;
        }
        return $hours.'h'.$minutes;
    }
    
}
