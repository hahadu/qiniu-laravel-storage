<?php

namespace Hahadu\QiniuStorage\Plugins;

use League\Flysystem\FilesystemAdapter;

/**
 * Class DownloadUrl
 * 得到公有资源下载地址 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->downloadUrl('foo/bar1.css'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class DownloadUrl
{
    /**
     * 获取公有资源下载地址
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @param string $domainType
     * @return string
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null, string $domainType = 'default')
    {
        return $adapter->downloadUrl($path, $domainType);
    }
}
