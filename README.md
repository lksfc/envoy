访客管理系统
===============================
## 说明
一般公司都没有专门的访客管理系统。
一般都使用纸质登记表，登录信息，发放访客贴或者临时工牌。

信息化时代，这些信息都应该电子化，方便管理，同时节省中间前台登记，通知员工环境。

## 使用
### 配置数据库
数据表为根目录`db.sql`

### 更新vender
```
composer update
```

### Demo
[http://envoy.pangxieke.com](http://envoy.pangxieke.com)

后台[http://envoy.pangxieke.com/admin.php](http://envoy.pangxieke.com/admin.php)
Account: admin
Password: 123456

## 代码结构

### 前台
使用Yii2搭建
前后台都在根目录，前后台共用Model

#### 入口
`index.php`

#### 功能
- 访客登记，选取接待人（人员信息可能是保密信息，所以必须输入名字才能查询）
- 登记信息查看
- 访客登记后，自动邮件通知对应接待人

### 后台

#### 入口
admin.php

#### 功能
- 访客来访列表
- 详情

### 配置
#### DB
`common/config/main-local.php`

#### 数据表
根目录`db.sql`

#### 配置项
`common/config/params.php`
同一个公司可以配置多个办公点
访客来访类型，可配置
```
//办公点
'locationList' => [
        1 => '办公点1',
        2 => '办公点2',
    ],
// 拜访类型
'visitorTypeList' => [
    1 => '拜访',
    2 => '面试',
    3 => '其它',
],
```

### 目录结构

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
```
