<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DTREdits extends Model
{
    protected $table = 'hr_dtr_edits';
    protected $fillable = ['slug','employee_no','biometric_user_id','time'];

    use SoftDeletes;
}