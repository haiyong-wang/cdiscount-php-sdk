<?php
declare(strict_types=1);

namespace Exewen\Cdiscount\Contract;


interface OfferInterface
{
    /**
     * 获取报价列表
     * 
     * @param array $params 查询参数
     * @param array $header 请求头
     * @return array 返回结果包含报价数据和分页信息
     */
    public function getOffers(array $params, array $header = []);

    public function getProducts(array $params, array $header = []);
}
