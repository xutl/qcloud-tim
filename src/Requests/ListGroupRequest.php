<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * Class ListGroupRequest
 * @package XuTL\QCloud\Tim\Requests
 */
class ListGroupRequest extends BaseRequest
{
    /**
     * ListGroupRequest constructor.
     * @param int $limit
     */
    public function __construct($limit = 10000)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/get_appid_group_list');
        $this->setLimit($limit);
    }

    /**
     * 本次获取的群组 ID 数量的上限，不得超过 10000。如果不填，默认为最大值 10000。
     * @param int $limit
     * @return ListGroupRequest
     */
    public function setLimit($limit)
    {
        $this->setParameter('Limit', $limit);
        return $this;
    }

    /**
     * 群太多时分页拉取标志，第一次填 0，以后填上一次返回的值，返回的 Next 为 0 代表拉完了。
     * @param int $next
     * @return $this
     */
    public function setNext($next)
    {
        $this->setParameter('Next', $next);
        return $this;
    }

    /**
     * 如果仅需要返回特定群组形态的群组，可以通过 GroupType 进行过滤，但此时返回的 TotalCount 的含义就变成了 App 中属于该群组形态的群组总数。不填为获取所有类型的群组。
     *    群组形态 包括 Public（公开群），Private（私密群），ChatRoom（聊天室），AVChatRoom（互动直播聊天室）和 BChatRoom（在线成员广播大群）。
     * @param string $type
     * @return $this
     */
    public function setGroupType($type)
    {
        $this->setParameter('GroupType', $type);
        return $this;
    }
}
