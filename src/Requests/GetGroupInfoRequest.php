<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;


use XuTL\QCloud\Tim\Http\BaseRequest;

class GetGroupInfoRequest extends BaseRequest
{

    /**
     * GetGroupInfoRequest constructor.
     * @param array $groupIds
     */
    public function __construct($groupIds)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/get_group_info');
        $this->setGroupIdList($groupIds);
    }

    /**
     * 获取群组ID列表
     * @param array $groupIds
     */
    public function setGroupIdList($groupIds)
    {
        $this->setParameter('GroupIdList', $groupIds);
    }
}
