<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class DeleteFriendGroupRequest extends BaseRequest
{
    /**
     * DeleteFriendGroupRequest constructor.
     * @param string $identifier
     * @param array|string $name
     */
    public function __construct($identifier, $name)
    {
        parent::__construct('POST', 'v4/sns/group_delete');
        $this->setIdentifier($identifier);
        $this->setGroupName($name);
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

    public function setGroupName($name)
    {
        $name = is_array($name) ? $name : [$name];
        $this->setParameter('GroupName', $name);
        return $this;
    }
}
