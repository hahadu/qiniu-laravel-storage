<?php namespace Hahadu\QiniuStorage;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Hahadu\QiniuStorage\Plugins\DownloadUrl;
use Hahadu\QiniuStorage\Plugins\Fetch;
use Hahadu\QiniuStorage\Plugins\ImageExif;
use Hahadu\QiniuStorage\Plugins\ImageInfo;
use Hahadu\QiniuStorage\Plugins\AvInfo;
use Hahadu\QiniuStorage\Plugins\ImagePreviewUrl;
use Hahadu\QiniuStorage\Plugins\LastReturn;
use Hahadu\QiniuStorage\Plugins\PersistentFop;
use Hahadu\QiniuStorage\Plugins\PersistentStatus;
use Hahadu\QiniuStorage\Plugins\PrivateDownloadUrl;
use Hahadu\QiniuStorage\Plugins\Qetag;
use Hahadu\QiniuStorage\Plugins\UploadToken;
use Hahadu\QiniuStorage\Plugins\PrivateImagePreviewUrl;
use Hahadu\QiniuStorage\Plugins\VerifyCallback;
use Hahadu\QiniuStorage\Plugins\WithUploadToken;

class QiniuFilesystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Storage::extend(
            'qiniu',
            function ($app, $config) {;
                $domains = when(isset($config['domains']),$config['domains'],[
                    'default' => $config['domain'],
                    'https'   => null,
                    'custom'  => null
                ]);

                $qiniu_adapter = new QiniuAdapter(
                    Arr::get($config,'access_key'),
                    Arr::get($config,'secret_key'),
                    Arr::get($config,'bucket'),
                    $domains,
                    Arr::get($config,'notify_url', null),
                    Arr::get($config,'access', 'public'),
                    Arr::get($config,'hotlink_prevention_key' , null)
                );
                $file_system = new Filesystem($qiniu_adapter);

                return new FilesystemAdapter($file_system, $qiniu_adapter, $config);
            }
        );
    }

    public function register()
    {
        //
    }
}
