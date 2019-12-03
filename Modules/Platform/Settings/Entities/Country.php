<?php

namespace Modules\Platform\Settings\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

class Country extends CachableModel
{

    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
    ];
    public $table = 'vaance_country';

    public $fillable = [
        'name',
        'cod_uic',
        'cod_iso',
        'is_active'
    ];

    protected $dates = ['deleted_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'cod_uic' => 'string',
        'cod_iso' => 'string',
        'is_active' => 'boolean'
    ];
}
