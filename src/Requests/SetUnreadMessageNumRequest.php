<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 设置成员未读消息计数
 * @package XuTL\QCloud\Tim\Requests
 */
class SetUnreadMessageNumRequest extends BaseRequest
{
    /**
     * SetUnreadMessageNumRequest constructor.
     * @param string $groupId 操作的群 ID。
     * @param string $memberAccount 要操作的群成员。
     * @param int $unreadMsgNum 成员未读消息数。
     */
    public function __construct($groupId, $memberAccount, $unreadMsgNum)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/set_unread_msg_num');
        $this->setGroupId($groupId);
        $this->setMemberAccount($memberAccount);
        $this->setUnreadMsgNum($unreadMsgNum);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return SetUnreadMessageNumRequest
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 要操作的群成员。
     * @param string $memberAccount
     * @return $this
     */
    public function setMemberAccount($memberAccount)
    {
        $this->setParameter('Member_Account', $memberAccount);
        return $this;
    }

    /**
     * 成员未读消息数。
     * @param int $unreadMsgNum
     * @return $this
     */
    public function setUnreadMsgNum($unreadMsgNum)
    {
        $this->setParameter('UnreadMsgNum', $unreadMsgNum);
        return $this;
    }
}
