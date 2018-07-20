<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 导入好友
 * @package XuTL\QCloud\Tim\Requests
 */
class ImportFriendRequest extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('POST', 'v4/sns/friend_import');
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
     * @param array $friendItem
     */
    public function setAddFriendItem($friendItem)
    {
        $this->setParameter('AddFriendItem', $friendItem);
    }
}
