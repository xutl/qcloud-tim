<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;

use XuTL\QCloud\Tim\Http\BaseResponse;

/**
 * Class ListGroupResponse
 * @package XuTL\QCloud\Tim\Responses
 */
class ListGroupResponse extends BaseResponse
{
    /**
     * @var int
     */
    public $TotalCount;

    /**
     * @var array
     */
    public $groupIds;

    /**
     * @var int
     */
    public $Next;

    /**
     * 解析返回的id
     * @param array $groupList
     */
    public function setGroupIdList($groupList)
    {
        if (!empty($groupList)) {
            foreach ($groupList as $group) {
                $this->groupIds[] = $group['GroupId'];
            }
        }

    }
}
