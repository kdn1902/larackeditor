<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable
{
	use Notifiable;

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'password', 'remember_token',
	];

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	public function authorizeRoles($roles)
	{
		if(is_array($roles)){
			return $this->hasAnyRole($roles) || false;
		}
		return $this->hasRole($roles) || false;
	}

	/**
	* Check multiple roles
	* @param array $roles
	*/
	public function hasAnyRole($roles)
	{
		return null !== $this->roles()->whereIn('name', $roles)->first();
	}

	/**
	* Check one role
	* @param string $role
	*/
	public function hasRole($role)
	{
		return null !== $this->roles()->where('name', $role)->first();
	}
	
	public function isAdmin()
	{
	     return $this->hasRole('admin');
	}
	
	public function isGuest()
	{
	     return $this->hasRole('guest');
	}
}
