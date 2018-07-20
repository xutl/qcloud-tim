<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 更新好友请求
 * @package XuTL\QCloud\Tim\Requests
 */
class UpdateFriendRequest extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('POST', 'v4/sns/friend_update');
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

    /**
     * 需要更新的好友对象数组。
     * @param array $updateItem
     * @return $this
     */
    public function setUpdateItem($updateItem)
    {
        $this->setParameter('UpdateItem', (string)$updateItem);
        return $this;
    }
}
