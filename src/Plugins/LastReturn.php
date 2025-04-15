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
 * Class LastReturn
 * 得到最后一次上传文件的 返回值 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->lastReturn(); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class LastReturn
{
    /**
     * 获取最后一次返回值
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null)
    {
        return $adapter->getLastReturn();
    }
}
