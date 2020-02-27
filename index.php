<?php

namespace App;

use App\Logger\Logger;
use App\Provider\CacheRateProvider;
use App\Provider\DatabaseRateProvider;
use App\Provider\ManagerRateProvider;
use App\Provider\ServiceRateProvider;

// Сервис - который разруливает логику получения текущего индекса валюты
// В рамках фреймворка Symfony я бы вынес этот код как сервис, который доступен из любой точки приложения
$cache    = new CacheRateProvider(new \Memcached());
$database = new DatabaseRateProvider(new \PDO('dsn data ...'));
$service  = new ServiceRateProvider();
$logger   = new Logger();
$provider = new ManagerRateProvider($cache, $database, $service, $logger);

// Просим сервис дать нам значения валют (тип float)
$rub = $provider->giveCurrentRate('rub');
$eur = $provider->giveCurrentRate('eur');
$usd = $provider->giveCurrentRate('usd');

/*todo: далее можно хранить значения валют в объекте, если будет прдесмотрена какая либо логика с ним,
 * например конверация значения из одной валюты в другую.
 * For example:
 * $rubObject = new RubCurrency($rub);
 * $rubObject->doSomething(...);
 */
