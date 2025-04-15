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
 * Class WithUploadToken
 * 下次 put 操作，将使用该 uploadToken 进行上传。 常用于持久化操作。 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->withUploadToken($token); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class WithUploadToken
{
    /**
     * 设置上传 Token
     *
     * @param FilesystemAdapter $adapter
     * @param string $token
     * @return void
     */
    public function __invoke(FilesystemAdapter $adapter, string $token)
    {
        $adapter->withUploadToken($token);
    }
}
