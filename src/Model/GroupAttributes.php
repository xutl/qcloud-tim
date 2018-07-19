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
     * 设置群组ID
     * @param string $groupId
     */
    public function setGroupId($groupId)
    {
        $this->items['GroupId'] = $groupId;
    }

    /**
     * 获取群组ID
     * @return string
     */
    public function getGroupId()
    {
        return $this->items['GroupId'] ?? '';

    }
}
