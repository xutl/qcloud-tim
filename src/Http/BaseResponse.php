<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Http;

use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseResponse
 * @package XuTL\QCloud\Tim\Http
 */
class BaseResponse
{
    /**
     * 解析响应
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function unwrapResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() != 200) {
            throw new ServerNetworkException($response->getStatusCode(), $response->getHeaders(), $response->getBody()->getContents());
        }
        $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        if ($content['code'] == 0) {
            $this->succeed = true;
            foreach ($content as $name => $value) {
                if (property_exists($this, $name)) {
                    $this->{$name} = $value;
                } else {
                    $this->_content[$name] = $value;
                }
            }
        } else {
            $this->unwrapErrorResponse($content);
        }
    }
}
