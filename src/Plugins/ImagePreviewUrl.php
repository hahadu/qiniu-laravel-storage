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
 * Class ImagePreviewUrl
 * 图片预览地址，常常带有图片操作符，生成缩略图、水印等 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->imagePreviewUrl('foo/bar1.css',$ops); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class ImagePreviewUrl
{
    /**
     * 获取图片预览URL
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @param string|array|null $ops
     * @return string
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null, $ops = null)
    {
        return $adapter->imagePreviewUrl($path, $ops);
    }
}
