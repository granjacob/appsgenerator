<?php

namespace system\exception;
use exception;


abstract class SystemException extends Exception {

    abstract function getExceptionMessage();
}