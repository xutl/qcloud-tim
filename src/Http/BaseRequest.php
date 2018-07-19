<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Http;

/**
 * 请求基类
 * @package XuTL\QCloud\Tim\Http
 */
class BaseRequest
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $requestUri;

    /**
     * Api参数
     * @var array
     */
    private $parameter = [];

    /**
     * BaseRequest constructor.
     * @param string $method
     * @param string $resourceUri
     */
    public function __construct($method, $resourceUri)
    {
        $this->method = $method;
        $this->requestUri = $resourceUri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * 批量设置请求参数
     * @param array $params
     */
    public function setParameters($params)
    {
        $this->parameter = array_merge_recursive($this->parameter,$params);
    }

    /**
     * @param string $key
     * @param string|array $value
     */
    public function setParameter($key, $value)
    {
        $this->parameter[$key] = $value;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return array_filter($this->parameter);
    }
}
