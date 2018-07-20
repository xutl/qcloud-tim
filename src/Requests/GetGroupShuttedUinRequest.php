<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class GetGroupShuttedUinRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class GetGroupShuttedUinRequest extends BaseRequest
{
    /**
     * GetGroupShuttedUinRequest constructor.
     * @param string $groupId
     */
    public function __construct($groupId)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/get_group_shutted_uin');
        $this->setGroupId($groupId);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return GetGroupShuttedUinRequest
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }
}
