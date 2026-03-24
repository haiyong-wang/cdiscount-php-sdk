<?php
declare(strict_types=1);

namespace ExewenTest\Cdiscount;

use Exewen\Cdiscount\Facade\OfferFacade;

/**
 * Cdiscount Offers API 测试类
 */
class OfferTest extends Base
{
    /**
     * 测试获取报价列表
     * @return void
     */
    public function testGetOffers()
    {
        $params = [
            'pageSize' => 5,
            'page'     => 1,
        ];
        
        $result = OfferFacade::getOffers($params);
        var_dump($result);
        $this->assertIsArray($result);
    }
}
