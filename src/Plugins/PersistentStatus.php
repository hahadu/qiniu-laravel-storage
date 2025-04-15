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
 * Class PersistentStatus
 * 查询持久化操作状态 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->persistentStatus('foo/bar1.css'); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class PersistentStatus
{
    /**
     * 查询持久化操作状态
     *
     * @param FilesystemAdapter $adapter
     * @param string $id
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, string $id)
    {
        return $adapter->persistentStatus($id);
    }
}
