<?php

namespace Zend\RequestLogger;

use Zend\Http\PhpEnvironment\Request;

interface LoggerInterface
{
    public function log(Request $request);
}