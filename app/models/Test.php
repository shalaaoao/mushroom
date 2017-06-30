<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Test extends Eloquent  {
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    protected $table = 'tests';
    protected $softDelete = true;
    protected $guarded = array('id');
}