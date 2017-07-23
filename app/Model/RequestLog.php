<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestLog extends Model{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'request_log';
    protected $softDelete = true;
    protected $guarded = array('id');
}