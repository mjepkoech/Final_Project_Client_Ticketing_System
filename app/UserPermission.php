<?php
/**
 * Created by PhpStorm.
 * User: mjepkoech
 * Date: 8/31/17
 * Time: 9:25 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'permission_id',
    ];

    /**
     * @var array
     */
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}