<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{


    protected $fillable = [
        'body', 'question_id', 'correct',
    ];

    public function question()

  {

    return $this->belongsTo(Question::class);

  }


}
