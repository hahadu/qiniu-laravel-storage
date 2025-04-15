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
 * Class PrivateDownloadUrl
 * 得到私有资源下载地址 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->privateDownloadUrl('foo/bar1.css'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class PrivateDownloadUrl
{
    /**
     * 获取私有资源下载地址
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @param string $settings
     * @return string
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null, string $settings = 'default')
    {
        return $adapter->privateDownloadUrl($path, $settings);
    }
}
