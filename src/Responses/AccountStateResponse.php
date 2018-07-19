<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;

use XuTL\QCloud\Tim\Http\BaseResponse;

/**
 * Class AccountStateResponse
 * @package XuTL\QCloud\Tim\Responses
 */
class AccountStateResponse extends BaseResponse
{
    /**
     * @var array
     */
    protected $QueryResult;

    /**
     * 查询结果
     * @return array
     */
    public function getQueryResult()
    {
        return $this->QueryResult;
    }
}
