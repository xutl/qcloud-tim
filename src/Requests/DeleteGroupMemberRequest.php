<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 删除群组成员
 * @package XuTL\QCloud\Tim\Requests
 */
class DeleteGroupMemberRequest extends BaseRequest
{
    /**
     * DeleteGroupMemberRequest constructor.
     * @param string $groupId
     * @param string|array $member 待删除的群成员。
     * @param string $reason 踢出用户原因。
     * @param int $silence 是否静默删人。0：非静默删人；1：静默删人。不填该字段默认为 0。
     */
    public function __construct($groupId, $member, $reason, $silence = 0)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/delete_group_member');
        $this->setGroupId($groupId);
        $this->setMember($member);
        $this->setReason($reason);
        $this->setSilence($silence);
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
     * 待删除的群成员。
     * @param string|array $member
     * @return $this
     */
    public function setMember($member)
    {
        $member = is_string($member) ? [$member] : $member;
        $this->setParameter('MemberToDel_Account', $member);
        return $this;
    }

    /**
     * 踢出用户原因。
     * @param string $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->setParameter('Reason', $reason);
        return $this;
    }

    /**
     * 是否静默删人。0：非静默删人；1：静默删人。不填该字段默认为 0。
     * @param int $silence
     * @return $this
     */
    public function setSilence($silence)
    {
        $this->setParameter('Silence', $silence);
        return $this;
    }
}
