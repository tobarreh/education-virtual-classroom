<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportError extends Model
{
    protected $table = "report_errors";
 	protected $fillable = ['title', 'content', 'solved', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
