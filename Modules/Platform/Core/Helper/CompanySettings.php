<?php

namespace Modules\Platform\Core\Helper;

use Krucas\Settings\Context;

class CompanySettings
{

    public static function get($key, $default = null)
    {
        return \Settings::get($key, $default);

    }

    public static function set($key, $value = null, $companyId = null)
    {
        return \Settings::set($key, $value);
    }

}
