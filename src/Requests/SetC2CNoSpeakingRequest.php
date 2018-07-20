<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * C2C禁言设置
 * @package XuTL\QCloud\Tim\Requests
 */
class SetC2CNoSpeakingRequest extends BaseRequest
{
    /**
     * SetC2CNoSpeakingRequest constructor.
     * @param string $identifier
     * @param int $noSpeakingTime
     */
    public function __construct($identifier, $noSpeakingTime)
    {
        parent::__construct('POST', 'v4/openconfigsvr/setnospeaking');
        $this->setIdentifier($identifier);
        $this->setC2CMsgNoSpeakingTime($noSpeakingTime);
    }

    /**
     * 用户名，长度不超过 32 字节
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->setParameter('Set_Account', (string)$identifier);
        return $this;
    }

    /**
     * @param int $noSpeakingTime 单聊消息禁言时间，秒为单位，非负整数，最大值为 4294967295(十六进制 0xFFFFFFFF)。
     * 等于 0 代表取消账户禁言；等于最大值 4294967295(十六进制 0xFFFFFFFF)代表账户永久被设置禁言；其它代表该账户禁言时间。
     * @return $this
     */
    public function setC2CMsgNoSpeakingTime($noSpeakingTime)
    {
        $this->setParameter('C2CmsgNospeakingTime', $noSpeakingTime);
        return $this;
    }
}
