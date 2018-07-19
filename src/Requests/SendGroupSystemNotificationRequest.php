<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 在群组中发送系统通知
 * @package XuTL\QCloud\Tim\Requests
 */
class SendGroupSystemNotificationRequest extends BaseRequest
{
    /**
     * SetGroupInfoRequest constructor.
     * @param string $groupId
     */
    public function __construct($groupId)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/send_group_system_notification');
        $this->setGroupId($groupId);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return SendGroupSystemNotificationRequest
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 接受者列表
     * @param array $members
     * @return $this
     */
    public function setToMembersAccount($members)
    {
        $this->setParameter('ToMembers_Account', $members);
        return $this;
    }

    /**
     * 发送的内容
     * @param string $content
     * @return SendGroupSystemNotificationRequest
     */
    public function setContent($content)
    {
        $this->setParameter('Content', $content);
        return $this;
    }
}
