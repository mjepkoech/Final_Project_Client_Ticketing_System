<?php
/**
 * Created by PhpStorm.
 * User: mjepkoech
 * Date: 8/31/17
 * Time: 9:28 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];


    protected $guarded = array('id', 'created_at', 'updated_at');

    public function userPermission()
    {
        return $this->hasMany(UserPermission::class);
    }
}