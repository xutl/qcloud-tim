<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 设置群组详细资料
 * @package XuTL\QCloud\Tim\Requests
 */
class SetGroupInfoRequest extends BaseRequest
{
    /**
     * SetGroupInfoRequest constructor.
     * @param string $groupId
     */
    public function __construct($groupId)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/modify_group_base_info');
        $this->setGroupId($groupId);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return SetGroupInfoRequest
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }


    /**
     * 设置全体禁言或解除全体禁言
     * @param string $shutUpAllMember
     * @return SetGroupInfoRequest
     */
    public function setShutUpAllMember($shutUpAllMember)
    {
        $this->setParameter('ShutUpAllMember', $shutUpAllMember);
        return $this;
    }
}
