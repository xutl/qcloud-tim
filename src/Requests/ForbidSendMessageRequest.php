<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class ForbidSendMessageRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class ForbidSendMessageRequest extends BaseRequest
{
    /**
     * ForbidSendMessageRequest constructor.
     * @param string $groupId
     * @param array|string $membersAccount
     * @param int $shutUpTime
     */
    public function __construct($groupId, $membersAccount, $shutUpTime)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/forbid_send_msg');
        $this->setGroupId($groupId);
        $this->setMembersAccount($membersAccount);
        $this->setShutUpTime($shutUpTime);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 需要禁言的用户帐号，最多支持 500 个帐号。
     * @param array|string $membersAccount
     * @return $this
     */
    public function setMembersAccount($membersAccount)
    {
        $membersAccount = is_string($membersAccount) ? [$membersAccount] : $membersAccount;
        $this->setParameter('Members_Account', $membersAccount);
        return $this;
    }

    /**
     * 需禁言时间，单位为秒，为 0 时表示取消禁言。
     * @param int $shutUpTime
     * @return $this
     */
    public function setShutUpTime($shutUpTime)
    {
        $this->setParameter('ShutUpTime', $shutUpTime);
        return $this;
    }
}
