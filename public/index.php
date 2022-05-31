<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

ini_set("soap.wsdl_cache_enabled", "0");

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
