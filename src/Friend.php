<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Requests\AddBlackRequest;
use XuTL\QCloud\Tim\Requests\AddFriendGroupRequest;
use XuTL\QCloud\Tim\Requests\AddFriendRequest;
use XuTL\QCloud\Tim\Requests\CheckBlackRequest;
use XuTL\QCloud\Tim\Requests\CheckFriendRequest;
use XuTL\QCloud\Tim\Requests\DeleteAllFriendRequest;
use XuTL\QCloud\Tim\Requests\DeleteBlackRequest;
use XuTL\QCloud\Tim\Requests\DeleteFriendGroupRequest;
use XuTL\QCloud\Tim\Requests\DeleteFriendRequest;
use XuTL\QCloud\Tim\Requests\GetAllFriendRequest;
use XuTL\QCloud\Tim\Requests\GetFriendRequest;
use XuTL\QCloud\Tim\Requests\ImportFriendRequest;
use XuTL\QCloud\Tim\Requests\ListBlackRequest;
use XuTL\QCloud\Tim\Requests\UpdateFriendRequest;
use XuTL\QCloud\Tim\Responses\DeleteFriendResponse;
use XuTL\QCloud\Tim\Responses\UpdateFriendResponse;

/**
 * 好友关系
 * @package XuTL\QCloud\Tim
 */
class Friend
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * 用户账号标识
     * @var string
     */
    protected $identifier;

    /**
     * Account constructor.
     * @param HttpClient $client
     * @param string $identifier
     */
    public function __construct(HttpClient $client, $identifier)
    {
        $this->client = $client;
        $this->identifier = $identifier;
    }

    /**
     * 添加好友
     * @param AddFriendRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function add(AddFriendRequest $request)
    {
        $request->setIdentifier($this->identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 导入好友
     * @param ImportFriendRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function import(ImportFriendRequest $request)
    {
        $request->setIdentifier($this->identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 更新好友
     * @param UpdateFriendRequest $request
     * @return BaseResponse|UpdateFriendResponse
     * @throws Exception\TIMException
     */
    public function update(UpdateFriendRequest $request)
    {
        $request->setIdentifier($this->identifier);
        $response = new UpdateFriendResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 删除好友
     * @param string|array $account
     * @param string $deleteType 默认双向删除
     * @return BaseResponse|DeleteFriendResponse
     * @throws Exception\TIMException
     */
    public function delete($account, $deleteType = Constants::FRIEND_DELETE_TYPE_BOTH)
    {
        $request = new DeleteFriendRequest($this->identifier, $account, $deleteType);
        $response = new DeleteFriendResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 删除所有好友
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function deleteAll()
    {
        $request = new DeleteAllFriendRequest($this->identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 批量校验好友关系
     * @param array|string $account
     * @param string $checkType
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function check($account, $checkType)
    {
        $request = new CheckFriendRequest($this->identifier, $account, $checkType);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 拉取好友
     * @param GetAllFriendRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function getAll(GetAllFriendRequest $request)
    {
        $request->setIdentifier($this->identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 拉取指定好友
     * @param GetFriendRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function getList(GetFriendRequest $request)
    {
        $request->setIdentifier($this->identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 添加黑名单
     * @param string|array $account
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function blackAdd($account)
    {
        $request = new AddBlackRequest($this->identifier, $account);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 删除黑名单
     * @param array|string $account
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function blackDelete($account)
    {
        $request = new DeleteBlackRequest($this->identifier, $account);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 获取黑名单列表
     * @param int $index
     * @param int $limit
     * @param int $lastSequence
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function blackList($index, $limit, $lastSequence = 0)
    {
        $request = new ListBlackRequest($this->identifier, $index, $limit, $lastSequence);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 黑名单检查
     * @param string|array $account
     * @param string $checkType
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function blackCheck($account, $checkType = Constants::BLACK_CHECK_RESULT_TYPE_BOTH)
    {
        $request = new CheckBlackRequest($this->identifier, $account, $checkType);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 添加好友分组
     * @param string $name
     * @param array|string $account
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function groupAdd($name, $account = null)
    {
        $request = new AddFriendGroupRequest($this->identifier, $name, $account);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 删除分组
     * @param string|array $name
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function groupDelete($name)
    {
        $request = new DeleteFriendGroupRequest($this->identifier, $name);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }
}
