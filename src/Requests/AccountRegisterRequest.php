<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 托管模式存量账号导入
 * @package XuTL\QCloud\Tim\Requests
 */
class AccountRegisterRequest extends BaseRequest
{
    /**
     * AccountRegisterRequest constructor.
     * @param string $identifier 用户名，长度不超过 32 字节
     * @param int $identifierType Identifier的类型，1:手机号(国家码-手机号) 2:邮箱 3:字符串帐号
     * @param string $password Identifier的密码，长度为8-16个字符。
     */
    public function __construct($identifier, $identifierType, $password)
    {
        parent::__construct('POST', 'v4/registration_service/register_account_v1');
        $this->setIdentifier($identifier);
        $this->setIdentifierType($identifierType);
        $this->setPasswoed($password);
    }

    /**
     * 设置用户名
     * @param string $identifier 用户名，长度不超过 32 字节
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->setParameter('Identifier', (string)$identifier);
        return $this;
    }

    /**
     * 设置账户类型
     * @param int $identifierType Identifier的类型，1:手机号(国家码-手机号) 2:邮箱 3:字符串帐号
     * @return $this
     */
    public function setIdentifierType($identifierType)
    {
        $this->setParameter('IdentifierType', (int)$identifierType);
        return $this;
    }

    /**
     * 设置密码
     * @param string $password Identifier的密码，长度为8-16个字符。
     * @return $this
     */
    public function setPasswoed($password)
    {
        $this->setParameter('Password', (string)$password);
        return $this;
    }
}
