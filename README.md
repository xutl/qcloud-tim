# qcloud-tim

腾讯云 TIM 云通信SDK，支持 同步 异步模式。

[![Build Status](https://travis-ci.org/xutl/qcloud-tim.svg?branch=master)](https://travis-ci.org/xutl/qcloud-tim)
[![License](https://poser.pugx.org/xutl/qcloud-tim/license.svg)](https://packagist.org/packages/xutl/qcloud-tim)
[![Latest Stable Version](https://poser.pugx.org/xutl/qcloud-tim/v/stable.png)](https://packagist.org/packages/xutl/qcloud-tim)
[![Total Downloads](https://poser.pugx.org/xutl/qcloud-tim/downloads.png)](https://packagist.org/packages/xutl/qcloud-tim)


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist xutl/qcloud-tim
```

or add

```
"xutl/qcloud-tim": "~1.0"
```

to the require section of your `composer.json` file.

## Use

```php
use XuTL\QCloud\Tim\Tim;
use XuTL\QCloud\Tim\Constants;

$client = new Tim(
    '1234557',
    '12341234',
    '13241234/j8/341234+HOcet3Of1cTErNDm9XubwIeAyO0YE1bQFWNn+Iyc4',
    'MFYwEAYHKoZIzj0CAQYF134K4EEAAoDQgAEmV31rGrO12341234TRcQJLu+8w689UYMxsZE06WUKwEQCCwCBh6PhznHrdzn9XExKzQ5vV7m8CHgMjtGBNW0BVjZ/iMnOA==',
    'webmaster'
);

//操作用户

$account = $client->getAccount('test112');
//获取用户资料
$profile = $account->getProfile();
//T下线
$account->kick();

//查询在线状态
$account->state();

//更多接口请看 
XuTL\QCloud\Tim\Account 类

//群组操作

$group = $client->getGroup('test');

//修改圈子属性
$groupAttributes = new GroupAttributes();
$groupAttributes->setName('方圆百里找对手');
$groupAttributes->setApplyJoinOption(Constants::GROUP_APPLY_JOIN_OPTION_FREE_ACCESS);
try {
    $res = $group->setInfo($groupAttributes);
    print_r($res);
} catch (\XuTL\QCloud\Tim\Exception\TIMException $e) {
    print_r($e->getMessage());
}
//更多圈子接口请看 
XuTL\QCloud\Tim\Group 类
```

