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
 * Class ImageExif
 * 查看图像EXIF <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->imageExif('foo/bar1.css'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class ImageExif
{
    /**
     * 获取图像EXIF信息
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null)
    {
        return $adapter->imageExif($path);
    }
}
