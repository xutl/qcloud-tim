<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class SendGroupMessageRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class SendGroupMessageRequest extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('POST', 'v4/group_open_http_svc/send_group_msg');
        $this->setParameter('Random', time() . uniqid());
    }

    /**
     * 向哪个群组发送消息。
     * @param string $groupId
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 发送者
     * @param string $fromAccount
     */
    public function setFromAccount($fromAccount)
    {
        $this->setParameter('From_Account', $fromAccount);
    }

    /**
     * 设置消息优先级
     * @param string $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->setParameter('MsgPriority', $priority);
        return $this;
    }

    /**
     * 如果消息体中指定 OnlineOnlyFlag，只要值大于 0，则消息表示只在线下发，不存离线和漫游（AVChatRoom 和 BChatRoom 不允许使用）
     * @param int $onlineOnlyFlag
     */
    public function setOnlineOnlyFlag($onlineOnlyFlag = 1)
    {
        $this->setParameter('OnlineOnlyFlag', $onlineOnlyFlag);
    }

    /**
     * 消息回调禁止开关，只对单条消息有效，
     * ForbidBeforeSendMsgCallback 表示禁止发消息前回调，ForbidAfterSendMsgCallback 表示禁止发消息后回调。
     * @param array $forbidCallbackControl
     * @return $this
     */
    public function setForbidCallbackControl($forbidCallbackControl)
    {
        $this->setParameter('ForbidCallbackControl', $forbidCallbackControl);
        return $this;
    }

    /**
     * 禁止发消息前回调
     * @return $this
     */
    public function setForbidBeforeSendMsgCallback()
    {
        $this->setParameter('ForbidCallbackControl', ['ForbidBeforeSendMsgCallback']);
        return $this;
    }

    /**
     * 禁止发消息后回调
     * @return $this
     */
    public function setForbidAfterSendMsgCallback()
    {
        $this->setParameter('ForbidAfterSendMsgCallback', ['ForbidAfterSendMsgCallback']);
        return $this;
    }

    /**
     * 推送相关
     * @param array $offlinePushInfo
     * @return $this
     */
    public function setOfflinePushInfo($offlinePushInfo)
    {
        $this->setParameter('OfflinePushInfo', $offlinePushInfo);
        return $this;
    }
}
