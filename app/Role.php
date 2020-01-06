<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
class Role extends \Spatie\Permission\Models\Role
{
//    use SoftDeletes;
    //

    static function CreateByName($name, $guard_name = 'web'){
        $role = static::GetByName($name);
        if(!empty($role)){
            if(!empty($role->deleted_at)){
                $role->restore();
            }
        }else{
            $role = new Role();
            $role->name = $name;
            $role->guard_name = $guard_name;
            $role->save();
        }
        return $role;
    }

    static function GetByName($name){
        return static::withTrashed()->where('name', '=', $name)->first();
    }

    public function hasPermissionTo($permission): bool
    {
        $permissionClass = $this->getPermissionClass();

        if (is_string($permission)) {
//            \Artisan::call('cache:clear');
            $permission = Permission::findByName($permission, 'web');
        }

        if (is_int($permission)) {
            $permission = $permissionClass->findById($permission, $this->getDefaultGuardName());
        }

        if (! $this->getGuardNames()->contains($permission->guard_name)) {
            throw GuardDoesNotMatch::create($permission->guard_name, $this->getGuardNames());
        }

        return $this->permissions->contains('id', $permission->id);
    }

}
