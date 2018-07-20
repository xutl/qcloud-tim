<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class DeleteBlackRequest extends BaseRequest
{
    public function __construct($identifier, $account)
    {
        parent::__construct('POST', 'v4/sns/black_list_delete');
        $this->setAccount($account);
    }

    /**
     * 用户名，长度不超过 32 字节
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->setParameter('From_Account', (string)$identifier);
        return $this;
    }

    public function setAccount($account)
    {
        $account = is_array($account) ? $account : [$account];
        $this->setParameter('To_Account', $account);
        return $this;
    }
}
