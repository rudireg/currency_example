<?php

namespace App\Provider;

class CacheRateProvider implements RateProviderInterface
{
    /**
     * @var \Memcached
     */
    private $cache;

    /**
     * @param \Memcached $cache
     */
    public function __construct(\Memcached $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @inheritDoc
     */
    public function giveCurrentRate(string $exchange): float
    {
        return $this->cache->get($exchange);
    }

    /**
     * @inheritDoc
     */
    public function saveCurrentRate(string $exchange, float $value)
    {
        $this->cache->set($exchange, $value);
    }
}
