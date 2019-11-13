<?php


namespace l1n6yun\DuoDuoKe;


use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
    /**
     * @var string
     */
    private $appKey;

    /**
     * @var string
     */
    private $secret;

    const URL = 'http://gw-api.pinduoduo.com/api/router/';

    public function __construct(string $appKey, string $secret)
    {
        $this->appKey = $appKey;
        $this->secret = $secret;
    }

    public function request(string $method,array $params,$dataType = 'JSON')
    {
        $params = $this->paramsHandle($params);
        $params = array_merge($params, [
            'client_id' => $this->appKey,
            'sign_method' => 'md5',
            'type' => $method,
            'data_type' => $dataType,
            'timestamp' => strval(time()),
        ]);
        $params['sign'] = $this->signature($params);

        $http = $this->getHttp();

        $response = $http->post(self::URL , $params);
        $result = strval($response->getBody());

        return strtolower($dataType) == 'json' ? json_decode($result, true) : $result;
    }

    private function paramsHandle(array $params)
    {
        array_walk($params, function (&$item) {
            if (is_array($item)) {
                $item = json_encode($item);
            }
            if (is_bool($item)) {
                $item = ['false', 'true'][intval($item)];
            }
        });
        return $params;
    }

    private function signature(array $params)
    {
        ksort($params);

        $waitSign = '';
        foreach ($params as $key => $item) {
            if ($item) {
                $waitSign .= $key.$item;
            }
        }

        return strtoupper(md5($this->secret . $waitSign . $this->secret));
    }
}