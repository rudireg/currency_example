<?php

namespace App\Provider;

class ServiceRateProvider implements RateProviderInterface
{
    /**
     * @inheritDoc
     */
    public function giveCurrentRate(string $exchange): float
    {
        // здесь логика запроса данных с внешнего API сервиса
        $ch = curl_init("http://www.example.com/");
        return curl_exec($ch);
    }

    /**
     * @inheritDoc
     */
    public function saveCurrentRate(string $exchange, float $value)
    {
    }
}
