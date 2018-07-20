<?php

namespace Zend\RequestLogger\Logger;

use Zend\Http\PhpEnvironment\Request;

interface LoggerInterface
{
    public function log(Request $request);
}
