<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 帐号登录态失效接口
 * @package XuTL\QCloud\Tim\Requests
 */
class AccountLoginKickRequest extends BaseRequest
{
    /**
     * AccountLoginKickRequest constructor.
     * @param string $identifier
     */
    public function __construct($identifier)
    {
        parent::__construct('POST', 'v4/im_open_login_svc/kick');
        $this->setIdentifier($identifier);
    }

    /**
     * 用户名，长度不超过 32 字节
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->setParameter('Identifier', (string)$identifier);
        return $this;
    }
}
