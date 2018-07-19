<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;


use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Requests\DestroyGroupRequest;
use XuTL\QCloud\Tim\Requests\GetGroupInfoRequest;

class Group
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * 群组标识
     * @var string
     */
    protected $groupId;

    /**
     * Account constructor.
     * @param HttpClient $client
     * @param string $groupId
     */
    public function __construct(HttpClient $client, $groupId)
    {
        $this->client = $client;
        $this->groupId = $groupId;
    }

    /**
     * 获取群组资料
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function getInfo()
    {
        $request = new GetGroupInfoRequest([$this->groupId]);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 解散群组
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function destroy()
    {
        $request = new DestroyGroupRequest($this->groupId);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

}
