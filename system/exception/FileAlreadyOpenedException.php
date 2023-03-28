<?php


namespace system\exception;

use system\exception\SystemException;


class FileAlreadyOpenedException extends SystemException {
    public function getExceptionMessage()
    {
        return "The file is already opened! Please close the file, for change the file path.";
    }
}


?>