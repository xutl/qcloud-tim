<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;


use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Model\GroupAttributes;
use XuTL\QCloud\Tim\Requests\DestroyGroupRequest;
use XuTL\QCloud\Tim\Requests\GetGroupInfoRequest;
use XuTL\QCloud\Tim\Requests\SendGroupSystemNotificationRequest;
use XuTL\QCloud\Tim\Requests\SetGroupInfoRequest;
use XuTL\QCloud\Tim\Responses\GetGroupInfoResponse;

/**
 * 群组操作
 * @package XuTL\QCloud\Tim
 */
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
        $response = new GetGroupInfoResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 设置群组资料
     * @param GroupAttributes $attributes
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function setInfo(GroupAttributes $attributes)
    {
        $request = new SetGroupInfoRequest($this->groupId);
        $request->setParameters($attributes->getItems());
        $response = new GetGroupInfoResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 在群组中发送系统通知
     * @param string $content
     * @param array $members
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function sendSystemNotification($content, $members = [])
    {
        $request = new SendGroupSystemNotificationRequest($this->groupId);
        $request->setContent($content);
        $request->setToMembersAccount($members);
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
