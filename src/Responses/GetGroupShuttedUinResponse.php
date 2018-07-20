<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;

use XuTL\QCloud\Tim\Http\BaseResponse;

class GetGroupShuttedUinResponse extends BaseResponse
{
    public $ShuttedUinList;

    public function getShuttedUinList()
    {
        return $this->ShuttedUinList;
    }
}
