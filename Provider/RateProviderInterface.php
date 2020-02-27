<?php

namespace App\Provider;

interface RateProviderInterface
{
    /**
     * Вернет текущий курс валюты
     *
     * @param string $currency
     * @return float
     */
    public function giveCurrentRate(string $currency): float;

    /**
     * Сохранит текущее значение для валюты
     *
     * @param string $currency
     * @param float $rate
     */
    public function saveCurrentRate(string $currency, float $rate);
}
