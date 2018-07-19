<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;
use XuTL\QCloud\Tim\Model\AccountProfile;

/**
 * 设置资料
 * @package XuTL\QCloud\Tim\Requests
 */
class SetAccountProfileRequest extends BaseRequest
{

    /**
     * SetAccountProfileRequest constructor.
     * @param string $identifier
     */
    public function __construct($identifier)
    {
        parent::__construct('POST', 'v4/profile/portrait_set');
        $this->setIdentifier($identifier);
    }

    /**
     * 用户名，长度不超过 32 字节
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->setParameter('From_Account', (string)$identifier);
        return $this;
    }

    /**
     * 设置用户资料项
     * @param AccountProfile $profile
     * @return $this
     */
    public function setProfileItem(AccountProfile $profile)
    {
        $this->setParameter('ProfileItem', $profile->getRequestItems());
        return $this;
    }
}
