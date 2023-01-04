<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 * 
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $exist
 *
 * @package App\Models
 */
class Bank extends Model
{
	protected $table = 'bank';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'code',
		'exist'
	];
}
