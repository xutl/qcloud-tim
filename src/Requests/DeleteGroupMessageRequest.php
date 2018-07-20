<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 删除指定用户发送的消息
 * @package XuTL\QCloud\Tim\Requests
 */
class DeleteGroupMessageRequest extends BaseRequest
{
    /**
     * DeleteGroupMessageRequest constructor.
     * @param string $groupId
     * @param string $senderAccount 被删除消息的发送者 ID。
     */
    public function __construct($groupId, $senderAccount)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/delete_group_msg_by_sender');
        $this->setGroupId($groupId);
        $this->setSenderAccount($senderAccount);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return DeleteGroupMessageRequest
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }


    /**
     * 被删除消息的发送者 ID。
     * @param string $senderAccount
     * @return $this
     */
    public function setSenderAccount($senderAccount)
    {
        $this->setParameter('Sender_Account', (string)$senderAccount);
        return $this;
    }
}
