# Z5加密 - Laravel拓展包

<p>Z5加密官方地址：<a href="https://z5encrypt.com/">https://z5encrypt.com/</a>，使用本拓展包可以在laravel中直接调用Z5加密的API进行加密PHP文件！</p>

## 安装

```Shell
$ composer require zhouzishu/laravel-z5encrypt
```

### 添加服务提供者（if laravel < 5.5）

```PHP
// laravel < 5.5
Zhouzishu\LaravelZ5Encrypt\ServiceProvider::class,

### 添加 alias（optional. if laravel < 5.5）

```PHP
'Z5Encrypt' => Zhouzishu\LaravelZ5Encrypt\Facades\Z5Encrypt::class,
```

### 配置API

```Shell
$ php artisan vendor:publish --provider="Zhouzishu\LaravelZ5Encrypt\ServiceProvider"
```

`.env` 文件里面配置

```PHP
Z5ENCRYPT_SECRET=
Z5ENCRYPT_TOKEN=
```

## 使用
```PHP
$content = '<?php function a () { echo "Hello World"; } a();';
$file_name = 'hello.php';
$ret = \Z5Encrypt::encryptFile($content, $file_name);

dd($ret->data); // 加密后的文件内容，可以通过Storage存储到本地及云端
```
