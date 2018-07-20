<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class GetNoSpeakingRequest extends BaseRequest
{
    public function __construct($identifier)
    {
        parent::__construct('POST', 'v4/openconfigsvr/getnospeaking');
        $this->setIdentifier($identifier);
    }

    /**
     * 用户名，长度不超过 32 字节
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->setParameter('Get_Account', (string)$identifier);
        return $this;
    }
}
