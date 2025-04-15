<?php
/**
 * Created by PhpStorm.
 * User: Frowhy
 * Date: 2016/5/24
 * Time: 13:09
 */

namespace Hahadu\QiniuStorage\Plugins;

use League\Flysystem\FilesystemAdapter;

/**
 * Class PrivateImagePreviewUrl
 * 获取私有bucket图片预览URL <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->privateImagePreviewUrl('foo/bar1.css',$ops); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class PrivateImagePreviewUrl
{
    /**
     * 获取私有bucket图片预览URL
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @param string|array|null $ops
     * @return string
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null, $ops = null)
    {
        return $adapter->privateImagePreviewUrl($path, $ops);
    }
}
