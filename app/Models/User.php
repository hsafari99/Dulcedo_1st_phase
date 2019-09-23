<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract
{
    use SoftDeletes;

    use AuthenticableTrait;
    use Notifiable;
    use CanResetPassword;

    public function hasAccess($access) {
        $roles = $this->roles;
        return in_array($access, $roles);
    }

    public function lastLogin() {
        $datetime = $this->last_connection_at;
        if ($datetime)
            //Carbon is a Laravel class that helps with time and dates.
            return Carbon::parse($datetime)->diffForHumans();
        else
            return "--";
    }

    public function votes() {
        return $this->hasMany('App\Models\Vote');
    }

    public function discoveries() {
        return $this->hasMany('App\Models\Discovery');
    }

    public function contact() {
        return $this->embedsOne('App\Models\Contact');
    }

    public function headscout_id() {
        $scout_groups = Scout_group::all();
        foreach ($scout_groups as $scout_group) {
            if (in_array($this->id, $scout_group->scout_ids))
                return $scout_group->headscout_id;
        }
        return null;
    }

    public function scout_group() {
        return Scout_group::where('headscout_id', $this->id)->get();
    }

    public function addRole($role) {
        $this->push('roles', $role, true);
    }

    public function removeRole($role) {
        $this->pull('roles', $role);
    }
}
