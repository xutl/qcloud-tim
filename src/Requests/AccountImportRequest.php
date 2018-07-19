<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 独立账户导入接口
 * @package XuTL\QCloud\Tim\Requests
 */
class AccountImportRequest extends BaseRequest
{
    /**
     * AccountImportRequest constructor.
     * @param string $identifier
     * @param string $nickname
     * @param string $faceUrl
     * @param int $type
     */
    public function __construct($identifier, $nickname, $faceUrl, $type = 0)
    {
        parent::__construct('POST', 'v4/im_open_login_svc/account_import');
        $this->setIdentifier($identifier);
        $this->setNick($nickname);
        $this->setFaceUrl($faceUrl);
        $this->setType($type);
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

    /**
     * 用户昵称
     * @param string $nickname
     * @return $this
     */
    public function setNick($nickname)
    {
        $this->setParameter('Nick', (string)$nickname);
        return $this;
    }

    /**
     * 用户头像URL。
     * @param string $faceUrl
     * @return $this
     */
    public function setFaceUrl($faceUrl)
    {
        $this->setParameter('FaceUrl', (string)$faceUrl);
        return $this;
    }

    /**
     * 帐号类型，开发者默认无需填写，值0表示普通帐号，1表示机器人帐号。
     * @param int $type
     * @return $this
     */
    public function setType($type)
    {
        $this->setParameter('Type', (int)$type);
        return $this;
    }

}
