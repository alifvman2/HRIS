<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxLocation
 * 
 * @property int $id
 * @property string|null $name
 *
 * @package App\Models
 */
class TaxLocation extends Model
{
	protected $table = 'tax_locations';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
