<?php
/**
 * Created by PhpStorm.
 * User: xutongle
 * Date: 2018-08-01
 * Time: 9:30
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 批量查询在线状态
 * @package XuTL\QCloud\Tim\Requests
 */
class BatchAccountStateRequest extends BaseRequest
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