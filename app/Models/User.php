<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string|null $rec_id
 * @property string $email
 * @property string $join_date
 * @property string|null $phone_number
 * @property string|null $status
 * @property string|null $role_name
 * @property string|null $avatar
 * @property string|null $position
 * @property string|null $department
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $keterangan
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property int|null $updated_by
 * @property Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class User extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'rec_id',
		'email',
		'join_date',
		'phone_number',
		'status',
		'role_name',
		'avatar',
		'position',
		'department',
		'email_verified_at',
		'password',
		'remember_token',
		'keterangan',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}