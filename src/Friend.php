<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Requests\AddFriendRequest;
use XuTL\QCloud\Tim\Requests\DeleteAllFriendRequest;
use XuTL\QCloud\Tim\Requests\DeleteFriendRequest;
use XuTL\QCloud\Tim\Requests\ImportFriendRequest;
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
     * @return BaseResponse
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
     * @return BaseResponse
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


    public function check()
    {

    }

    public function getAll()
    {

    }

    public function getList()
    {

    }

    public function blackListAdd()
    {
    }

    public function blackListDelete()
    {
    }

    public function blackListGet()
    {
    }

    public function blackListCheck()
    {
    }

    public function groupAdd()
    {
    }

    public function groupDelete()
    {
    }
}
