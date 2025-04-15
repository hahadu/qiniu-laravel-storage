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
 * Class Fetch
 * 调用qiniu的fetch指令 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->fetch('http://abc.com/foo.jpg', 'bar.jpg'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class Fetch
{
    /**
     * 执行fetch操作
     *
     * @param FilesystemAdapter $adapter
     * @param string $url
     * @param string $key
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, string $url, string $key)
    {
        return $adapter->fetch($url, $key);
    }
}
