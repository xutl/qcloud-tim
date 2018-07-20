<?php

/**
 * Created by PhpStorm.
 * User: xutongle
 * Date: 2018-07-20
 * Time: 11:47
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 群组禁言设置
 * @package XuTL\QCloud\Tim\Requests
 */
class SetGroupNoSpeakingRequest extends BaseRequest
{
    /**
     * SetGroupNoSpeakingRequest constructor.
     * @param string $identifier
     * @param int $noSpeakingTime 群组消息禁言时间，秒为单位，非负整数，最大值为 4294967295(十六进制0xFFFFFFFF)。
     * 等于 0 代表取消帐号禁言；最大值 4294967295(0xFFFFFFFF)代表账户永久禁言；其它代表该账户禁言时间。
     */
    public function __construct($identifier, $noSpeakingTime)
    {
        parent::__construct('POST', 'v4/openconfigsvr/setnospeaking');
        $this->setIdentifier($identifier);
        $this->setGroupMsgNoSpeakingTime($noSpeakingTime);
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
