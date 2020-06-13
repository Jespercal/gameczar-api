<?php
/**
 * Copyright 2016 Eric Enold <zyberspace@zyberware.org>
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */
namespace jespercal\gameczar-api;

class Client
{
    const BASE_URL = 'https://steamspy.com/api.php';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $_guzzleClient;

    public function __construct()
    {
        $this->_guzzleClient = new \GuzzleHttp\Client(array(
            'base_uri' => self::BASE_URL
        ));
    }

    public function call($interface, $httpMethod, $index)
    {
		$path = "https://steamspy.com/api.php?request=appdetails&appid=$index";
		//echo "<br>Returned path: $path";

        $response = $this->_guzzleClient->request($httpMethod, $path, array());

        return json_decode($response->getBody()->getContents(),true);
    }
}