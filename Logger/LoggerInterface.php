<?php

namespace App\Logger;

interface LoggerInterface
{
    /**
     * @param string $msg
     */
    public function info(string $msg);

    /**
     * @param string $msg
     */
    public function error(string $msg);

    /**
     * @param string $msg
     */
    public function critical(string $msg);
}
