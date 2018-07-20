<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class BatchSendMessageRequest extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('POST', 'v4/openim/batchsendmsg');
    }
}
