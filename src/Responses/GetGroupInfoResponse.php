<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;


use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Model\GroupAttributes;

class GetGroupInfoResponse extends BaseResponse
{
    /**
     * @var GroupAttributes
     */
    protected $groupInfo;

    /**
     * 用户资料
     * @param array $groupInfo
     */
    public function setGroupInfo($groupInfo)
    {
        $this->groupInfo = new GroupAttributes($groupInfo[0]);
    }

    /**
     * @return GroupAttributes
     */
    public function getGroupInfo()
    {
        return $this->groupInfo;
    }
}
