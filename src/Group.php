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
use XuTL\QCloud\Tim\Requests\ChangeOwnerRequest;
use XuTL\QCloud\Tim\Requests\DeleteGroupMemberRequest;
use XuTL\QCloud\Tim\Requests\DeleteGroupMessageRequest;
use XuTL\QCloud\Tim\Requests\DestroyGroupRequest;
use XuTL\QCloud\Tim\Requests\ForbidSendMessageRequest;
use XuTL\QCloud\Tim\Requests\GetGroupInfoRequest;
use XuTL\QCloud\Tim\Requests\GetGroupShuttedUinRequest;
use XuTL\QCloud\Tim\Requests\GetUserRoleRequest;
use XuTL\QCloud\Tim\Requests\SendGroupSystemNotificationRequest;
use XuTL\QCloud\Tim\Requests\SetGroupInfoRequest;
use XuTL\QCloud\Tim\Requests\SetUnreadMessageNumRequest;
use XuTL\QCloud\Tim\Responses\ForbidSendMessageResponse;
use XuTL\QCloud\Tim\Responses\GetGroupInfoResponse;
use XuTL\QCloud\Tim\Responses\GetGroupShuttedUinResponse;
use XuTL\QCloud\Tim\Responses\GetUserRoleResponse;

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
     * 转让群组
     * @param string $owner
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function changeOwner($owner)
    {
        $request = new ChangeOwnerRequest($this->groupId, $owner);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 删除指定用户发送的消息
     * @param string $senderAccount
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function deleteMessage($senderAccount)
    {
        $request = new DeleteGroupMessageRequest($this->groupId, $senderAccount);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 设置成员未读消息计数
     * @param string $memberAccount
     * @param int $unreadMsgNum
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function setUnreadMessageNum($memberAccount, $unreadMsgNum)
    {
        $request = new SetUnreadMessageNumRequest($this->groupId, $memberAccount, $unreadMsgNum);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 获取群组被禁言用户列表
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function getGroupShuttedUin()
    {
        $request = new GetGroupShuttedUinRequest($this->groupId);
        $response = new GetGroupShuttedUinResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 批量禁言和取消禁言
     * @param array|string $membersAccount 需要禁言的用户帐号，最多支持 500 个帐号。
     * @param int $shutUpTime 需禁言时间，单位为秒，为 0 时表示取消禁言。
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function forbidSendMessage($membersAccount, $shutUpTime)
    {
        $request = new ForbidSendMessageRequest($this->groupId, $membersAccount, $shutUpTime);
        $response = new ForbidSendMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 查询用户在群组中的身份
     * @param string|array $userAccount
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function getUserRole($userAccount)
    {
        $request = new GetUserRoleRequest($this->groupId, $userAccount);
        $response = new GetUserRoleResponse();
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
     * 删除群组成员
     * @param string|array $member
     * @param null $reason
     * @param int $silence
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function deleteMember($member, $reason = null, $silence = 0)
    {
        $request = new DeleteGroupMemberRequest($this->groupId, $member, $reason, $silence = 0);
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
