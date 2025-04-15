<?php

namespace Hahadu\QiniuStorage\Plugins;

use League\Flysystem\FilesystemAdapter;

/**
 * Class AvInfo
 * 查看多媒体文件属性 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->avInfo('filename.mp3'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class AvInfo
{
    /**
     * 获取多媒体文件信息
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, string $path = null)
    {
        return $adapter->avInfo($path);
    }
}
