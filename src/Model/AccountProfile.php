<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Model;
use XuTL\QCloud\Tim\Constants;

/**
 * 用户资料
 * @package XuTL\QCloud\Tim\Model
 */
class AccountProfile
{
    /**
     * 资料项
     * @var array
     */
    protected $items = [];

    /**
     * AccountProfile constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        if (!empty($items)) {
            $this->setItems($items);
        }
    }

    /**
     * 获取资料项 用来发送请求
     * @return array
     */
    public function getRequestItems()
    {
        $items = [];
        foreach ($this->items as $key => $value) {
            $items[] = [
                'Tag' => $key,
                'Value' => $value
            ];
        }
        return $items;
    }

    /**
     * 获取资料项
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * 批量设置用户资料
     * @param array $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {
            $this->items[$item['Tag']] = $item['Value'];
        }
    }

    /**
     * 设置昵称
     * @param string $nick
     * @return AccountProfile
     */
    public function setNick($nick)
    {
        $this->items['Tag_Profile_IM_Nick'] = $nick;
        return $this;
    }

    /**
     * 设置性别
     * @param string $gender
     * @return AccountProfile
     */
    public function setGender($gender = Constants::GENDER_TYPE_UNKNOWN)
    {
        $this->items['Tag_Profile_IM_Gender'] = $gender;
        return $this;
    }

    /**
     * 设置生日
     * @param int $birthDay
     * @return AccountProfile
     */
    public function setBirthDay($birthDay)
    {
        $this->items['Tag_Profile_IM_BirthDay'] = $birthDay;
        return $this;
    }

    /**
     * 获取生日
     * @return string
     */
    public function getBirthDay()
    {
        return $this->items['Tag_Profile_IM_BirthDay'] ?? '';
    }

    /**
     * 设置所在地
     * @param string $location 长度不得超过 16 个字节，推荐用法如下：
     * APP本地定义一套数字到地名的映射关系；
     * 后台实际保存的是 4 个 uint32_t 类型的数字；
     * 其中第一个 uint32_t 表示国家；
     * 第二个 uint32_t 用于表示省份；
     * 第三个 uint32_t 用于表示城市；
     * 第四个 uint32_t 用于表示区县。
     * @return $this
     */
    public function setLocation($location)
    {
        $this->items['Tag_Profile_IM_Location'] = $location;
        return $this;
    }

    /**
     * 获取所在地
     * @return string
     */
    public function getLocation()
    {
        return $this->items['Tag_Profile_IM_Location'] ?? '';
    }

    /**
     * 个性签名
     * @param string $selfSignature
     * @return $this
     */
    public function setSelfSignature($selfSignature)
    {
        $this->items['Tag_Profile_IM_SelfSignature'] = $selfSignature;
        return $this;
    }

    /**
     * 获取个性签名
     * @return string
     */
    public function getSelfSignature()
    {
        return $this->items['Tag_Profile_IM_SelfSignature'] ?? '';
    }

    /**
     * 设置 加好友验证方式
     * @param string $allowType
     * @return $this
     */
    public function setAllowType($allowType)
    {
        $this->items['Tag_Profile_IM_AllowType'] = $allowType;
        return $this;
    }

    /**
     * 获取加好友验证方式
     * @return string
     */
    public function getAllowType()
    {
        return $this->items['Tag_Profile_IM_AllowType'] ?? '';
    }

    /**
     * 语言
     * @param string $language
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->items['Tag_Profile_IM_Language'] = $language;
        return $this;
    }

    /**
     * 获取语言
     * @return string
     */
    public function getLanguage()
    {
        return $this->items['Tag_Profile_IM_Language'] ?? '';
    }

    /**
     * 头像Url
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->items['Tag_Profile_IM_Image'] = $image;
        return $this;
    }

    /**
     * 获取头像
     * @return string
     */
    public function getImage()
    {
        return $this->items['Tag_Profile_IM_Image'] ?? '';
    }

    /**
     * 消息设置
     * @param int $msgSettings Bit0：置 0 表示接收消息，置 1 则不接收消息。
     * @return $this
     */
    public function setMsgSettings($msgSettings)
    {
        $this->items['Tag_Profile_IM_MsgSettings'] = $msgSettings;
        return $this;
    }

    /**
     * 获取消息设置
     * @return int
     */
    public function getMsgSettings()
    {
        return $this->items['Tag_Profile_IM_MsgSettings'] ?? '';
    }

    /**
     * 管理员禁止加好友标识
     * @param string $adminForbidType
     * @return $this
     */
    public function setAdminForbidType($adminForbidType = Constants::ADMIN_FORBID_TYPE_NONE)
    {
        $this->items['Tag_Profile_IM_AdminForbidType'] = $adminForbidType;
        return $this;
    }

    /**
     * 获取管理员禁止加好友标识
     * @return string
     */
    public function getAdminForbidType()
    {
        return $this->items['Tag_Profile_IM_AdminForbidType'] ?? '';
    }

    /**
     * 等级
     * @param string $level
     * @return $this
     */
    public function setLevel($level)
    {
        $this->items['Tag_Profile_IM_Level'] = $level;
        return $this;
    }

    /**
     * 获取等级
     * @return string
     */
    public function getLevel()
    {
        return $this->items['Tag_Profile_IM_Level'];
    }

    /**
     * 角色
     * @param string $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->items['Tag_Profile_IM_Role'] = $role;
        return $this;
    }

    /**
     * 获取角色
     * @return string
     */
    public function getRole()
    {
        return $this->items['Tag_Profile_IM_Role'];
    }
}
