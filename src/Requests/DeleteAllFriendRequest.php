<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 删除所有好友
 * @package XuTL\QCloud\Tim\Requests
 */
class DeleteAllFriendRequest extends BaseRequest
{
    /**
     * DeleteAllFriendRequest constructor.
     * @param string $identifier
     */
    public function __construct($identifier)
    {
        parent::__construct('POST', 'v4/sns/friend_delete_all');
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
}
