<?php
/**
 * Created by PhpStorm.
 * User: ZhangWB
 * Date: 2015/4/21
 * Time: 16:42
 */

namespace Hahadu\QiniuStorage\Plugins;

use League\Flysystem\FilesystemAdapter;

/**
 * Class UploadToken
 * 获取上传Token <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->uploadToken('foo/bar1.css'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class UploadToken
{
    /**
     * 获取上传Token
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @param int $expires
     * @param array|null $policy
     * @param bool $strictPolicy
     * @return string
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null, int $expires = 3600, ?array $policy = null, bool $strictPolicy = true)
    {
        return $adapter->uploadToken($path, $expires, $policy, $strictPolicy);
    }
}
