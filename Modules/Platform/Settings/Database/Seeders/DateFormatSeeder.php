<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\CrudHelper;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class SettingsDateFormatSeeder
 */
class DateFormatSeeder extends SeederHelper
{
    private static $_DATE_FORMAT_DATA = array(
        ['id' => '1', 'name' => 'YYYY-MM-DD', 'details' => 'Y-m-d', 'js_details' => 'YYYY-MM-DD'],
        ['id' => '2', 'name' => 'YY-MM-DD', 'details' => 'y-m-d', 'js_details' => 'YY-MM-DD'],
        ['id' => '3', 'name' => 'MM/DD/YYYY', 'details' => 'm/d/Y', 'js_details' => 'MM/DD/YYYY'],
        ['id' => '4', 'name' => 'MM/DD/YY', 'details' => 'm/d/y', 'js_details' => 'MM/DD/YY'],
        ['id' => '5', 'name' => 'DD/MM/YYYY', 'details' => 'd/m/Y', 'js_details' => 'DD/MM/YYYY'],
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints();

        DB::table('vaance_date_format')->truncate();

        $this->saveOrUpdate('vaance_date_format', self::$_DATE_FORMAT_DATA);
    }
}
