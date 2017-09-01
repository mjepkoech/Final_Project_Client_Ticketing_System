<?php
namespace Ticketing\Authorization;

use App\Permission;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: mjepkoech
 * Date: 8/31/17
 * Time: 9:32 PM
 */

trait Authorization
{

    /**
     * @param $name
     * @return bool
     */
    public function checkPermission($name)
    {
        //Check if permission exists
        $permission = Permission::where('name', $name)->first();

        if(!is_null($permission))
        {
            $userPermission = UserPermission::where('permission_id', $permission->id)->where('user_id', Auth::id())->first();

            if(!is_null($userPermission))
            {
                return true;
            }

            return false;
        }

        return false;
    }
}