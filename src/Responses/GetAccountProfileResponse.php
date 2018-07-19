<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Model\AccountProfile;

/**
 * Class GetAccountProfileResponse
 * @package XuTL\QCloud\Tim\Responses
 */
class GetAccountProfileResponse extends BaseResponse
{
    /**
     * @var int
     */
    protected $CurrentStandardSequence;

    /**
     * @var string
     */
    protected $ErrorDisplay;

    protected $userProfileItem;

    /**
     * 用户资料
     * @param array $UserProfileItem
     */
    public function setUserProfileItem($UserProfileItem)
    {
        $this->userProfileItem = new AccountProfile($UserProfileItem[0]['ProfileItem']);
    }

    /**
     * @return array
     */
    public function getUserProfileItem()
    {
        return $this->userProfileItem;
    }
}
