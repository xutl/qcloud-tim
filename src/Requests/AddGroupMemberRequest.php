<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 增加群组成员
 * @package XuTL\QCloud\Tim\Requests
 */
class AddGroupMemberRequest extends BaseRequest
{
    /**
     * AddGroupMemberRequest constructor.
     * @param string $groupId
     * @param string|array $members
     * @param int $silence 是否静默加人。0：非静默加人；1：静默加人。不填该字段默认为 0。
     */
    public function __construct($groupId, $members, $silence = 0)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/add_group_member');
        $this->setGroupId($groupId);
        if (is_array($members)) {
            $this->setMemberList($members);
        } else {
            $this->setMemberAccount($members);
        }
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
     * 待添加的群成员帐号。
     * @param string $members
     * @return $this
     */
    public function setMemberAccount($members)
    {
        $this->setParameter('Member_Account', $members);
        return $this;
    }

    /**
     * 待添加的群成员数组。
     * @param array $members
     * @return $this
     */
    public function setMemberList($members)
    {
        $this->setParameter('MemberList', $members);
        return $this;
    }

    /**
     * 是否静默加人。0：非静默加人；1：静默加人。不填该字段默认为 0。
     * @param int $silence
     * @return $this
     */
    public function setSilence($silence)
    {
        $this->setParameter('Silence', $silence);
        return $this;
    }

}
