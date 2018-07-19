<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;

use XuTL\QCloud\Tim\Http\BaseResponse;

/**
 * Class MultiAccountImportResponse
 * @package XuTL\QCloud\Tim\Responses
 */
class MultiAccountImportResponse extends BaseResponse
{
    /**
     * @var array
     */
    protected $FailAccounts;

    /**
     * 导入失败的账户列表
     * @return array
     */
    public function getFailAccounts()
    {
        return $this->FailAccounts;
    }
}
