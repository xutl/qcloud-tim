<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 创建群组
 * @package XuTL\QCloud\Tim\Requests
 */
class CreateGroupRequest extends BaseRequest
{
    /**
     * CreateGroupRequest constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct('POST', 'v4/group_open_http_svc/create_group');
        if (!empty($items)) {
            $this->setParameters($items);
        }
    }

    /**
     * 自定义圈子ID
     * @param string $groupId
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 设置群主
     * @param string $ownerAccount
     * @return $this
     */
    public function setOwnerAccount($ownerAccount)
    {
        $this->setParameter('Owner_Account', (string)$ownerAccount);
        return $this;
    }

    /**
     * 群组名称
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->setParameter('Name', $name);
        return $this;
    }

    /**
     * 群组类别
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->setParameter('Type', $type);
        return $this;
    }

    /**
     * 圈子头像
     * @param string $faceUrl
     * @return $this
     */
    public function setFaceUrl($faceUrl)
    {
        $this->setParameter('FaceUrl', $faceUrl);
        return $this;
    }

    /**
     * 设置最大成员数量
     * @param int $maxMemberCount
     * @return $this
     */
    public function setMaxMemberCount($maxMemberCount)
    {
        $this->setParameter('MaxMemberCount', $maxMemberCount);
        return $this;
    }

    /**
     * 群简介（选填）
     * @param string $introduction
     * @return $this
     */
    public function setIntroduction($introduction)
    {
        $this->setParameter('Introduction', $introduction);
        return $this;
    }

    /**
     * 群公告（选填）
     * @param string $notification
     * @return $this
     */
    public function setNotification($notification)
    {
        $this->setParameter('Notification', $notification);
        return $this;
    }

    /**
     * 申请加群处理方式（选填）
     * @param string $applyJoinOption
     * @return $this
     */
    public function setApplyJoinOption($applyJoinOption)
    {
        $this->setParameter('ApplyJoinOption', $applyJoinOption);
        return $this;
    }

    /**
     * 群组维度的自定义字段（选填）
     * @param array $params
     * @return $this
     */
    public function setAppDefinedData(array $params)
    {
        $items = [];
        foreach ($params as $key => $value) {
            $items[] = ['Tag' => $key, 'Value' => $value];
        }
        $this->setParameter('AppDefinedData', $items);
        return $this;
    }

    /**
     * 批量设置成员+角色
     * @param array $members
     * @return $this
     */
    public function setMemberList(array $members)
    {
        $memberLists = [];
        foreach ($members as $key => $value) {
            $memberLists[] = ['Member_Account' => $key, 'Role' => $value];
        }
        $this->setParameter('MemberList', $memberLists);
        return $this;
    }
}
