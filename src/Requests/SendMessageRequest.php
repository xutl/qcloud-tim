<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class SendMessageRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class SendMessageRequest extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('POST', 'v4/openim/sendmsg');
        $this->setParameter('MsgRandom', uniqid());
        $this->setParameter('MsgTimeStamp', time());
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
        $this->setParameter('To_Account', $toAccount);
        return $this;
    }

    /**
     * @param int $syncOtherMachine 1：把消息同步到 From_Account 在线终端和漫游上；
     * 2：消息不同步至 From_Account；若不填写默认情况下会将消息存 From_Account 漫游
     * @return $this
     */
    public function setSyncOtherMachine($syncOtherMachine)
    {
        $this->setParameter('SyncOtherMachine', $syncOtherMachine);
        return $this;
    }

    /**
     * 消息离线保存时长（秒数），最长为 7 天（604800s）。若消息只发在线用户，不想保存离线，则该字段填 0。若不填，则默认保存 7 天
     * @param int $lifeTime
     * @return $this
     */
    public function setMsgLifeTime($lifeTime)
    {
        $this->setParameter('MsgLifeTime', $lifeTime);
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

    /**
     * 离线推送信息配置，具体可参考 消息格式描述。
     * @param array $offlinePushInfo
     * @return $this
     */
    public function setOfflinePushInfo($offlinePushInfo)
    {
        $this->setParameter('OfflinePushInfo', $offlinePushInfo);
        return $this;
    }
}
