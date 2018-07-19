<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Responses;

use XuTL\QCloud\Tim\Http\BaseResponse;

/**
 * Class SetAccountProfileResponse
 * @package XuTL\QCloud\Tim\Responses
 */
class SetAccountProfileResponse extends BaseResponse
{
    /**
     * @var string
     */
    public $ErrorDisplay;

    /**
     * @return string
     */
    public function getErrorDisplay()
    {
        return $this->ErrorDisplay;
    }
}
