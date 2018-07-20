<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class ListBlackRequest extends BaseRequest
{
    public function __construct($identifier, $index, $limit, $lastSequence = 0)
    {
        parent::__construct('POST', 'v4/sns/black_list_get');
        $this->setIdentifier($identifier);
        $this->setStartIndex($index);
        $this->setMaxLimited($limit);
        $this->setLastSequence($lastSequence);
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

    public function setStartIndex($index)
    {
        $this->setParameter('StartIndex', $index);
        return $this;
    }

    public function setMaxLimited($limit)
    {
        $this->setParameter('MaxLimited', $limit);
        return $this;
    }

    public function setLastSequence($lastSequence)
    {
        $this->setParameter('LastSequence', $lastSequence);
        return $this;
    }
}
