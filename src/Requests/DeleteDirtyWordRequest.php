<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

class DeleteDirtyWordRequest extends BaseRequest
{
    public function __construct($words)
    {
        parent::__construct('POST', 'v4/openim_dirty_words/delete');
        $this->setDirtyWordsList($words);
    }

    public function setDirtyWordsList($words)
    {
        $words = is_array($words) ? $words : [$words];
        $this->setParameter('DirtyWordsList', $words);
        return $this;
    }
}
