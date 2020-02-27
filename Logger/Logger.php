<?php

namespace App\Logger;

class Logger implements LoggerInterface
{
    const INFO = 1;
    const ERROR = 2;
    const CRITICAL = 3;

    /**
     * @inheritDoc
     */
    public function info(string $msg)
    {
        $this->saveLogMessage(self::INFO, $msg);
    }

    /**
     * @inheritDoc
     */
    public function error(string $msg)
    {
        $this->saveLogMessage(self::ERROR, $msg);
    }

    /**
     * @inheritDoc
     */
    public function critical(string $msg)
    {
        $this->saveLogMessage(self::CRITICAL, $msg);
    }

    /**
     * @param int $type
     * @param string $msg
     */
    protected function saveLogMessage(int $type, string $msg)
    {
        //todo: Сохраним тип и тело сообщения в лог (в файл или в БД или еще куда угодно)
    }
}
