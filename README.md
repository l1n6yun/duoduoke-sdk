# 多多客API SDK【拼多多开放平台】

### 要求

1. PHP >= 7.0
3. ext-curl 拓展
4. ext-json 拓展

### 安装

composer require l1n6yun/duoduoke-sdk

### 使用

```php
use l1n6yun\DuoDuoKe\DuoDuoKe;

$config = [
    'app_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'secret' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'debug' => false,
    'log' => [
        'name' => 'DuoDuoKe',
        'file' => __DIR__ . '/DuoDuoKe.log',
        'level' => 'debug',
        'permission' => 0777,
    ],
];

$duoduoke = new DuoDuoKe($config);
```

### 调用示例

> 多多进宝商品详情查询 pdd.ddk.goods.detail
>
```php
$result = $duoduoke->request('pdd.ddk.goods.detail', ['goods_id_list' => ['395581006']]);
```

### 文档

[拼多多开放平台](http://open.pinduoduo.com/)  · [官方文档](http://open.pinduoduo.com/#/apidocument)
