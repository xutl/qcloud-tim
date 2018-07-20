<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class GetFriendRequest extends BaseRequest
{
    public function __construct($identifier)
    {
        parent::__construct('POST', 'v4/sns/friend_get_list');
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

    public function setTagList($tagList)
    {
        $this->setParameter('TagList', $tagList);
        return $this;
    }
}
