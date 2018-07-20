<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 校验好友
 * @package XuTL\QCloud\Tim\Requests
 */
class CheckFriendRequest extends BaseRequest
{
    public function __construct($identifier, $account, $checkType)
    {
        parent::__construct('POST', 'v4/sns/friend_check');
        $this->setIdentifier($identifier);
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

    public function setCheckType($checkType)
    {
        $this->setParameter('CheckType', (string)$checkType);
        return $this;
    }


}
