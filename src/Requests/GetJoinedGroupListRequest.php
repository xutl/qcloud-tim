<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 获取用户所加入的群组
 * @package XuTL\QCloud\Tim\Requests
 */
class GetJoinedGroupListRequest extends BaseRequest
{
    /**
     * GetJoinedGroupListRequest constructor.
     * @param string $identifier
     * @param int $limit
     * @param int $offset
     * @param string $groupType
     * @param array $responseFilter
     */
    public function __construct($identifier, $limit, $offset, $groupType = null, $responseFilter = null)
    {
        parent::__construct('POST', 'v4/group_open_http_svc/get_joined_group_list');
        $this->setIdentifier($identifier);
        $this->setLimit($limit);
        $this->setOffset($offset);
        $this->setGroupType($groupType);
        $this->setResponseFilter($responseFilter);
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

    public function setLimit($limit)
    {
        $this->setParameter('Limit', $limit);
        return $this;
    }

    public function setOffset($offset)
    {
        $this->setParameter('Offset', $offset);
        return $this;
    }

    /**
     * 群组类型
     * @param string $groupType
     * @return $this
     */
    public function setGroupType($groupType)
    {
        $this->setParameter('GroupType', $groupType);
        return $this;
    }

    /**
     * 过滤器
     * @param array $responseFilter
     * @return $this
     */
    public function setResponseFilter($responseFilter)
    {
        $this->setParameter('ResponseFilter', $responseFilter);
        return $this;
    }
}
