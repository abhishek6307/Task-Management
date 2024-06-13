<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description', 'status', 'priority', 'due_date', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   

    public function getPriorityTextAttribute()
    {
        switch ($this->priority) {
            case 'high':
                return 'High Priority';
            case 'medium':
                return 'Medium Priority';
            case 'low':
                return 'Low Priority';
            default:
                return 'Unknown Priority';
        }
    }
}
