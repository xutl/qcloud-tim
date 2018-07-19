<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Model;

/**
 * Class GroupAttributes
 * @package XuTL\QCloud\Tim\Model
 */
class GroupAttributes
{
    /**
     * 资料项
     * @var array
     */
    protected $items = [];

    /**
     * AccountProfile constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        if (!empty($items)) {
            $this->setItems($items);
        }
    }

    /**
     * 获取群组资料项
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * 批量设置群组资料
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * 获取应用ID
     * @return int|string
     */
    public function getAppid()
    {
        return $this->items['Appid'] ?? '';
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return GroupAttributes
     */
    public function setGroupId($groupId)
    {
        $this->items['GroupId'] = $groupId;
        return $this;
    }

    /**
     * 获取群组ID
     * @return string
     */
    public function getGroupId()
    {
        return $this->items['GroupId'] ?? '';
    }

    /**
     * 设置群组名称
     * @param string $name
     * @return GroupAttributes
     */
    public function setName($name)
    {
        $this->items['Name'] = $name;
        return $this;
    }

    /**
     * 获取群组名称
     * @return string
     */
    public function getName()
    {
        return $this->items['Name'] ?? '';
    }

    public function getType()
    {
        return $this->items['Type'] ?? '';
    }

    /**
     * 圈子头像
     * @param string $faceUrl
     * @return $this
     */
    public function setFaceUrl($faceUrl)
    {
        $this->items['FaceUrl'] = $faceUrl;
        return $this;
    }

    public function getFaceUrl()
    {
        return $this->items['FaceUrl'] ?? '';
    }

    /**
     * 设置最大成员数量
     * @param int $maxMemberCount
     * @return $this
     */
    public function setMaxMemberCount($maxMemberCount)
    {
        $this->items['MaxMemberCount'] = $maxMemberCount;
        return $this;
    }

    public function getMaxMemberCount()
    {
        return $this->items['MaxMemberCount'] ?? '';
    }

    /**
     * 群简介（选填）
     * @param string $introduction
     * @return $this
     */
    public function setIntroduction($introduction)
    {
        $this->items['Introduction'] = $introduction;
        return $this;
    }

    public function getIntroduction()
    {
        return $this->items['Introduction'] ?? '';
    }

    /**
     * 群公告（选填）
     * @param string $notification
     * @return $this
     */
    public function setNotification($notification)
    {
        $this->items['Notification'] = $notification;
        return $this;
    }

    public function getNotification()
    {
        return $this->items['Notification'] ?? '';
    }

    /**
     * 申请加群处理方式（选填）
     * @param string $applyJoinOption
     * @return $this
     */
    public function setApplyJoinOption($applyJoinOption)
    {
        $this->items['ApplyJoinOption'] = $applyJoinOption;
        return $this;
    }

    public function getApplyJoinOption()
    {
        return $this->items['ApplyJoinOption'] ?? '';
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
        $this->items['AppDefinedData'] = $items;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getAppDefinedData()
    {
        return $this->items['AppDefinedData'] ?? '';
    }

}
