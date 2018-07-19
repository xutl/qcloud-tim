<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 获取用户在线状态
 * @package XuTL\QCloud\Tim\Requests
 */
class AccountStateRequest extends BaseRequest
{

    /**
     * AccountStateRequest constructor.
     * @param array $accounts
     */
    public function __construct(array $accounts)
    {
        parent::__construct('POST', 'v4/openim/querystate');
        $this->setAccounts($accounts);
    }

    /**
     * 用户账户
     * @param array $accounts
     * @return $this
     */
    public function setAccounts(array $accounts)
    {
        $this->setParameter('To_Account', $accounts);
        return $this;
    }
}
