<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class ChangeOwnerRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class ChangeOwnerRequest extends BaseRequest
{
    /**
     * ChangeOwnerRequest constructor.
     * @param string $groupId
     * @param string $newOwnerAccount
     */
    public function __construct($groupId, $newOwnerAccount)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/change_group_owner');
        $this->setGroupId($groupId);
        $this->setNewOwnerAccount($newOwnerAccount);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return ChangeOwnerRequest
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 新群主 ID。
     * @param string $newOwnerAccount
     * @return $this
     */
    public function setNewOwnerAccount($newOwnerAccount)
    {
        $this->setParameter('NewOwner_Account', $newOwnerAccount);
        return $this;
    }
}
