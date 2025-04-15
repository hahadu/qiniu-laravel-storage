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
 * Class ImageInfo
 * 查看图像属性 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->imageInfo('foo/bar1.css'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class ImageInfo
{
    /**
     * 获取图像信息
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null)
    {
        return $adapter->imageInfo($path);
    }
}
