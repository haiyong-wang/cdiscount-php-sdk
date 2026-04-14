<?php

namespace Exewen\Cdiscount\Facade;

use Exewen\Cdiscount\Contract\OfferInterface;
use Exewen\Facades\AppFacade;
use Exewen\Facades\Facade;
use Exewen\Http\HttpProvider;
use Exewen\Logger\LoggerProvider;


/**
 * Cdiscount Offers API 门面类
 * 
 * @method static array getOffers(array $params, array $header = [])  获取报价列表
 * @method static array getProducts(array $params, array $header = [])  获取产品列表
 */
class OfferFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return OfferInterface::class;
    }

    public static function getProviders(): array
    {
        AppFacade::getContainer()->singleton(OfferInterface::class);

        return [
            LoggerProvider::class,
            HttpProvider::class
        ];
    }
}
