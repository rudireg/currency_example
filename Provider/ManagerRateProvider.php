<?php

namespace App\Provider;

use App\Logger\LoggerInterface;

class ManagerRateProvider
{
    /**
     * @var RateProviderInterface
     */
    private $cache;

    /**
     * @var RateProviderInterface
     */
    private $database;

    /**
     * @var RateProviderInterface
     */
    private $service;

    /**
     * @var RateProviderInterface
     */
    private $logger;

    /**
     * @param RateProviderInterface $cache
     * @param RateProviderInterface $database
     * @param RateProviderInterface $service
     * @param LoggerInterface $logger
     */
    public function __construct(
        RateProviderInterface $cache,
        RateProviderInterface $database,
        RateProviderInterface $service,
        LoggerInterface $logger
    ) {
        $this->cache = $cache;
        $this->database = $database;
        $this->service = $service;
        $this->logger = $logger;
    }

    /**
     * @param string $currency
     * @return float
     */
    public function giveCurrentRate(string $currency): float
    {
        // cache
        try {
            if (!empty($rate = $this->cache->giveCurrentRate($currency))) {
                return $rate;
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        // Database
        try {
            if (!empty($rate = $this->database->giveCurrentRate($currency))) {
                $this->cache->saveCurrentRate($currency, $rate);
                return $rate;
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        // Service
        try {
            if (!empty($rate = $this->service->giveCurrentRate($currency))) {
                $this->cache->saveCurrentRate($currency, $rate);
                $this->database->saveCurrentRate($currency, $rate);
                return $rate;
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return 0;
    }
}
