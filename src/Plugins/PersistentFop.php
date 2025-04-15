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
 * Class PersistentFop
 * 执行持久化操作 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->persistentFop('foo/bar1.css'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class PersistentFop
{
    /**
     * 执行持久化操作
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $path
     * @param string|null $fops
     * @param string|null $pipline
     * @param bool $force
     * @param string|null $notify_url
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $path = null, ?string $fops = null, ?string $pipline = null, bool $force = false, ?string $notify_url = null)
    {
        return $adapter->persistentFop($path, $fops, $pipline, $force, $notify_url);
    }
}
