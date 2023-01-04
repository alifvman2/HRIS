<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CountryDatum
 * 
 * @property int $id_country
 * @property string $country_name
 * @property string $code1
 * @property string $code2
 * @property string $flag
 *
 * @package App\Models
 */
class CountryDatum extends Model
{
	protected $table = 'country_data';
	protected $primaryKey = 'id_country';
	public $timestamps = false;

	protected $fillable = [
		'country_name',
		'code1',
		'code2',
		'flag'
	];
}
