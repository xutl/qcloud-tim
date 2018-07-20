<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 获取群组成员详细资料
 * @package XuTL\QCloud\Tim\Requests
 */
class GetGroupMemberInfoRequest extends BaseRequest
{
    /**
     * GetGroupMemberInfoRequest constructor.
     * @param string $groupId
     * @param int $limit
     * @param int $offset
     * @param null $memberInfoFilter
     * @param null $memberRoleFilter
     * @param null $appDefinedDataFilter
     */
    public function __construct($groupId, $limit, $offset = 0, $memberRoleFilter = null, $memberInfoFilter = null, $appDefinedDataFilter = null)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/get_group_member_info');
        $this->setGroupId($groupId);
    }

    /**
     * 需要拉取成员信息的群组的 ID。
     * @param string $groupId
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 一次最多获取多少个成员的资料，不得超过 10000。如果不填，则获取群内全部成员的信息。
     * @param int $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->setParameter('Limit', $limit);
        return $this;
    }

    /**
     * 从第几个成员开始获取，如果不填则默认为 0，表示从第一个成员开始获取。
     * @param int $offset
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->setParameter('Offset', $offset);
        return $this;
    }

    /**
     * 需要获取哪些信息， 如果没有该字段则为群成员全部资料
     * @param array $memberInfoFilter
     * @return $this
     */
    public function setMemberInfoFilter($memberInfoFilter)
    {
        $this->setParameter('MemberInfoFilter', $memberInfoFilter);
        return $this;
    }

    /**
     * 拉取指定身份的群成员资料。如没有填写该字段，默认为所有身份成员资料，成员身份可以为：“Owner”，“Admin”，“Member”。
     * @param array $memberRoleFilter
     * @return $this
     */
    public function setMemberRoleFilter($memberRoleFilter)
    {
        $this->setParameter('MemberRoleFilter', $memberRoleFilter);
        return $this;
    }

    /**
     * 默认情况是没有的。该字段用来群成员维度的自定义字段过滤器，指定需要获取的群成员维度的自定义字段，群成员维度的自定义字段详情参见：自定义字段。
     * @param array $memberInfoFilter
     * @return $this
     */
    public function setAppDefinedDataFilterGroupMember($memberInfoFilter)
    {
        $this->setParameter('AppDefinedDataFilter_GroupMember', $memberInfoFilter);
        return $this;
    }
}
