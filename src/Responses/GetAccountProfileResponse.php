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

    /**
     * @var array
     */
    protected $UserProfileItem;

    /**
     * @return array
     */
    public function getUserProfileItem()
    {
        $items = [];
        foreach ($this->UserProfileItem as $item) {
            $items[] = new AccountProfile($item['ProfileItem']);
        }
        return $items;
    }
}
