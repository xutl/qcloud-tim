<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class GetMessageHistoryRequest extends BaseRequest
{
    /**
     * GetMessageHistoryRequest constructor.
     * @param string $type
     * @param string $time
     */
    public function __construct($type, $time)
    {
        parent::__construct('POST', 'v4/open_msg_svc/get_history');
        $this->setChatType($type);
        $this->setMsgTime($time);
    }

    public function setChatType($type)
    {
        $this->setParameter('ChatType', $type);
        return $this;
    }

    public function setMsgTime($time)
    {
        $this->setParameter('MsgTime', $time);
        return $this;
    }
}
