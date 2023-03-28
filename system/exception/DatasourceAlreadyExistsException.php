<?php


namespace system\exception;

use system\exception\SystemException;


class DatasourceAlreadyExistsException extends SystemException {
    public function getExceptionMessage()
    {
        return "Datasource already exists!";
    }
}


?>