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
 * Class Qetag
 * 得到最后一次上传文件的 Qetag <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->qetag(); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class Qetag
{
    /**
     * 获取最后一次上传文件的 Qetag
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @return string
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null)
    {
        return $adapter->getLastQetag();
    }
}
