<?php namespace Hahadu\QiniuStorage;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use JsonSerializable;

class QiniuUrl implements JsonSerializable
{
    private $parameters = [];
    //private $hotPreventionKey = null;

    public function __construct(private string $url, private ?string $hotPreventionKey = null)
    {

    }

    public function __toString()
    {
        return $this->buildUrl()->toString();
    }

    protected function buildUrl():Stringable
    {
        $url = Str::of(trim($this->getUrl(), '?&'));

        $parameters = $this->getParameters();

        if ($this->isHotlinkPrevention()) {
            [$sign, $t] = $this->hotlinkPreventionSign();
            $parameters[] = "sign=$sign";
            $parameters[] = "t=$t";
        }
        $parameterString = implode('&', $parameters);

        if ($parameterString) {
            $url = $url->append(strrpos($url, '?') === false ? "?$parameterString" : "&$parameterString");
        }
        return $url;

    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getDownload():array
    {
        return $this->getParameter('download');
    }

    /**
     * @param string $download
     * @return QiniuUrl
     */
    public function setDownload(string $download):self
    {
        return $this->setParameter('download', urlencode($download));
    }

    /**
     * @return array|string
     */
    public function getParameter($name):array|string
    {
        return $this->parameters[$name];
    }

    /**
     * @return array
     */
    public function getParameters():array
    {
        return $this->parameters;
    }

    /**
     * @param $name
     * @param $value
     * @return QiniuUrl
     */
    public function setParameter($name, $value):self
    {
        $this->parameters[$name] = $name . '/' . $value;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return $this->__toString();
    }


    private function hotlinkPreventionSign():array
    {
        $t = dechex(time() + 3600);
        $parsedUrl = parse_url($this->url);
        if ($parsedUrl === false) {
            throw new \InvalidArgumentException("Invalid URL provided.");
        }
        $pendingString = $this->getHotPreventionKey() . str_replace('%2F', '/', urlencode($parsedUrl['path'])) . $t;
        $sign = strtolower(md5($pendingString));
        return [$sign, $t];
    }

    /**
     * @return bool
     */
    public function isHotlinkPrevention()
    {
        return !!$this->getHotPreventionKey();
    }

    /**
     * @return null
     */
    public function getHotPreventionKey()
    {
        return $this->hotPreventionKey;
    }

    /**
     * @param null $hotPreventionKey
     */
    public function setHotPreventionKey($hotPreventionKey)
    {
        $this->hotPreventionKey = $hotPreventionKey;
    }
}
