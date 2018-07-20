<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class SetNoSpeakingRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class SetNoSpeakingRequest extends BaseRequest
{
    /**
     * SetNoSpeakingRequest constructor.
     * @param string $identifier
     * @param int $C2CNoSpeaking
     * @param int $groupNoSpeaking
     */
    public function __construct($identifier, $C2CNoSpeaking, $groupNoSpeaking)
    {
        parent::__construct('POST', 'v4/openconfigsvr/setnospeaking');
        $this->setIdentifier($identifier);
        $this->setC2CMsgNoSpeakingTime($C2CNoSpeaking);
        $this->setGroupMsgNoSpeakingTime($groupNoSpeaking);
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

    /**
     * @param int $noSpeakingTime 群组消息禁言时间，秒为单位，非负整数，最大值为 4294967295(十六进制0xFFFFFFFF)。
     * 等于 0 代表取消帐号禁言；最大值 4294967295(0xFFFFFFFF)代表账户永久禁言；其它代表该账户禁言时间。
     * @return $this
     */
    public function setGroupMsgNoSpeakingTime($noSpeakingTime)
    {
        $this->setParameter('GroupmsgNospeakingTime', $noSpeakingTime);
        return $this;
    }
}
