<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 查询用户在群组中的身份
 * @package XuTL\QCloud\Tim\Requests
 */
class GetUserRoleRequest extends BaseRequest
{
    /**
     * GetUserRoleRequest constructor.
     * @param string $groupId
     * @param string|array $userAccount
     */
    public function __construct($groupId, $userAccount)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/get_role_in_group');
        $this->setGroupId($groupId);
        $this->setUserAccount($userAccount);
    }

    /**
     * 设置群组ID
     * @param string $groupId
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * 表示需要查询的用户帐号，最多支持 500 个帐号。
     * @param array|string $userAccount
     * @return $this
     */
    public function setUserAccount($userAccount)
    {
        $userAccount = is_string($userAccount) ? [$userAccount] : $userAccount;
        $this->setParameter('User_Account', $userAccount);
        return $this;
    }
}
