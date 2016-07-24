<?php
	class Location extends GlobeApi{
		public $accessToken;
		public $address;
		public $requestedAccuracy;
		public $version;

		public $curlURL = "https://devapi.globelabs.com.ph/location/v1/queries/location";

		public function __construct(
	        $version = null,
	       	$accessToken = null,
	        $address = null
	    ) {

	        $this->version = $version;
	        $this->address = $address;
	        $this->accessToken = $accessToken;
	    }

	  public function get_location($requestedAccuracy=null, $bodyOnly = true) {

        if($requestedAccuracy) {
            $this->requestedAccuracy = $requestedAccuracy;
        }

        $url = sprintf(
            $this->curlURL,
            GlobeAPI::API_ENDPOINT,
            $this->version
        );

        $fields = array(
            'access_token' => $this->accessToken,
            'address' => $this->address,
            'requestedAccuracy'=> $this->requestedAccuracy
        );

        $fields = array_filter($fields);

        $response = $this->_curlGet($url, $fields);

        return $this->getReturn($response, $bodyOnly);
	}
}
?>