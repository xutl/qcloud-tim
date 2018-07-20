<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class GetAllFriendRequest extends BaseRequest
{
    public function __construct($identifier)
    {
        parent::__construct('POST', 'v4/sns/friend_get_all');
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

    public function setTimeStamp($timeStamp)
    {
        $this->setParameter('TimeStamp', $timeStamp);
        return $this;
    }

    public function setStartIndex($startIndex)
    {
        $this->setParameter('StartIndex', $startIndex);
        return $this;
    }

    public function setTagList($tagList)
    {
        $this->setParameter('TagList', $tagList);
        return $this;
    }

    public function setLastStandardSequence($lastStandardSequence)
    {
        $this->setParameter('LastStandardSequence', $lastStandardSequence);
        return $this;
    }

    public function setLimit($limit)
    {
        $this->setParameter('GetCount', $limit);
        return $this;
    }

    public function setGetCount($getCount)
    {
        $this->setParameter('GetCount', $getCount);
        return $this;
    }

}
