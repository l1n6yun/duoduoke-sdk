<?php


namespace l1n6yun\DuoDuoKe;


use Hanson\Foundation\Foundation;

class DuoDuoKe extends Foundation
{
    /**
     * @param $method
     * @param array $params
     * @return mixed|string
     */
    public function request($method, $params = [])
    {
        $api = new Api($this->getConfig('app_key'), $this->getConfig('secret'));

        return $api->request($method, $params);
    }
}