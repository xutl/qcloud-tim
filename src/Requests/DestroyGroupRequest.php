<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 解散群组
 * @package XuTL\QCloud\Tim\Requests
 */
class DestroyGroupRequest extends BaseRequest
{
    /**
     * DestroyGroupRequest constructor.
     * @param string $groupId
     */
    public function __construct($groupId)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/destroy_group');
        $this->setGroupId($groupId);
    }

    /**
     * 操作的群 ID。
     * @param string $groupId
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
    }
}
