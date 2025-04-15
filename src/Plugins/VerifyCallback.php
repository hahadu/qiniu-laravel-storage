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
 * Class verifyCallback
 * 验证回调是否正确 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->verifyCallback('application/x-www-form-urlencoded', $request->header('Authorization'), 'callback url', $request->getContent()); <br>
 * @package Hahadu\QiniuStorage\Plugins
 */
class VerifyCallback
{
    /**
     * 验证回调
     *
     * @param FilesystemAdapter $adapter
     * @param string|null $contentType
     * @param string|null $originAuthorization
     * @param string|null $url
     * @param string|null $body
     * @return mixed
     */
    public function __invoke(FilesystemAdapter $adapter, ?string $contentType = null, ?string $originAuthorization = null, ?string $url = null, ?string $body = null)
    {
        return $adapter->verifyCallback($contentType, $originAuthorization, $url, $body);
    }
}
