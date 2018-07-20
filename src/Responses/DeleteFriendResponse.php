<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;

use XuTL\QCloud\Tim\Http\BaseResponse;

class DeleteFriendResponse extends BaseResponse
{
    public $ResultItem;
    public $Fail_Account;
    public $Invalid_Account;
}
