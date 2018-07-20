<?php

/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 撤回群消息
 * @package XuTL\QCloud\Tim\Requests
 */
class RecallGroupMessageRequest extends BaseRequest
{
    /**
     * RecallGroupMessageRequest constructor.
     * @param string $groupId
     * @param array $msgSeqs
     */
    public function __construct($groupId, $msgSeqs)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/group_msg_recall');
        $this->setGroupId($groupId);
        $this->setMsgSeqList($msgSeqs);
    }


    public function setGroupId($groupId)
    {
        $this->setParameter('GroupId', $groupId);
        return $this;
    }

    /**
     * @param array $MsgSeqs
     * @return $this
     */
    public function setMsgSeqList($MsgSeqs)
    {
        $msgSeqList = [];
        foreach ($MsgSeqs as $MsgSeq) {
            $msgSeqList[] = ['MsgSeq' => $MsgSeq];
        }
        $this->setParameter('MsgSeqList', $msgSeqList);
        return $this;
    }

}
