<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionList
 * 
 * @property int $id
 * @property string|null $permission_name
 * @property string|null $read
 * @property string|null $write
 * @property string|null $create
 * @property string|null $delete
 * @property string|null $import
 * @property string|null $export
 *
 * @package App\Models
 */
class PermissionList extends Model
{
	protected $table = 'permission_lists';
	public $timestamps = false;

	protected $fillable = [
		'permission_name',
		'read',
		'write',
		'create',
		'delete',
		'import',
		'export'
	];
}
