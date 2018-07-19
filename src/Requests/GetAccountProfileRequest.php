<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class GetAccountProfileRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class GetAccountProfileRequest extends BaseRequest
{
    /**
     * AccountLoginKickRequest constructor.
     * @param array $accounts
     */
    public function __construct(array $accounts)
    {
        parent::__construct('POST', 'v4/profile/portrait_get');
        $this->setAccounts($accounts);
    }

    /**
     * 用户账户
     * @param array $accounts
     * @return $this
     */
    public function setAccounts(array $accounts)
    {
        $this->setParameter('To_Account', $accounts);
        $this->setParameter('TagList', [
            'Tag_Profile_IM_Nick',
            'Tag_Profile_IM_Gender',
            'Tag_Profile_IM_BirthDay',
            'Tag_Profile_IM_Location',
            'Tag_Profile_IM_SelfSignature',
            'Tag_Profile_IM_AllowType',
            'Tag_Profile_IM_Language',
            'Tag_Profile_IM_Image',
            'Tag_Profile_IM_MsgSettings',
            'Tag_Profile_IM_AdminForbidType',
            'Tag_Profile_IM_Level',
            'Tag_Profile_IM_Role'
        ]);
        return $this;
    }
}
