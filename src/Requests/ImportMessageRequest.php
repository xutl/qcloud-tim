<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class ImportMessageRequest extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('POST', 'v4/openim/importmsg');
    }

    /**
     * 消息发送方帐号。（用于指定发送消息方帐号）
     * @param string $fromAccount
     * @return $this
     */
    public function setFromAccount($fromAccount)
    {
        $this->setParameter('From_Account', $fromAccount);
        return $this;
    }

    /**
     * 消息接收方帐号。
     * @param string $toAccount
     * @return $this
     */
    public function setToAccount($toAccount)
    {
        $toAccount = is_array($toAccount) ? $toAccount : [$toAccount];
        $this->setParameter('To_Account', $toAccount);
        return $this;
    }

    /**
     * @param int $syncFromOldSystem 1，实时消息导入，消息加入未读计数；
     * 2，历史消息导入，消息不计入未读。
     * @return $this
     */
    public function setSyncFromOldSystem($syncFromOldSystem)
    {
        $this->setParameter('SyncFromOldSystem', $syncFromOldSystem);
        return $this;
    }

    /**
     * 设置消息内容
     * @param array $body
     * @return $this
     */
    public function setMsgBody($body)
    {
        $this->setParameter('MsgBody', $body);
        return $this;
    }
}
