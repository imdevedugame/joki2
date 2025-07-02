<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Google extends BaseConfig
{
    public $clientID     = '281574555581-5botjr4jk41mklp4tbo434rksn94q64d.apps.googleusercontent.com';
    public $clientSecret = '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';
    public $redirectUri  = 'http://localhost:8080/auth/googleCallback';
}
