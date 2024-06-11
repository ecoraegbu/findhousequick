<?php

class Geolocation {
    private static $apiKey = 'AIzaSyDpKzaLDH-Uvq3akmmeQmqU9Md3lTr-QTk';
    private const GEOLOCATION_API_URL = 'https://www.googleapis.com/geolocation/v1/geolocate';
    private const GEOCODING_API_URL = 'https://maps.googleapis.com/maps/api/geocode/json';
    
    // Function to get the location using IP
    public static function getLocationByIP() {
        $url = self::GEOLOCATION_API_URL . '?key=' . self::$apiKey;
        $jsonData = json_encode(['considerIp' => 'true']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            //echo 'cURL error: ' . curl_error($ch);
            return false;
        }

        curl_close($ch);

        $responseData = json_decode($response, true);
        if (isset($responseData['error'])) {
            echo 'Error: ' . $responseData['error']['message'];
            return false;
        }

        return $responseData;
    }

    // Function to get the address from latitude and longitude
    public static function getAddress($latitude, $longitude) {
        $url = self::GEOCODING_API_URL . '?latlng=' . urlencode($latitude . ',' . $longitude) . '&key=' . self::$apiKey;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            return false;
        }

        curl_close($ch);

        $responseData = json_decode($response, true);

        if (isset($responseData['error_message'])) {
            echo 'Error: ' . $responseData['error_message'];
            return false;
        }

        if (isset($responseData['results'][0]['formatted_address'])) {
            return $responseData['results'][0]['formatted_address'];
        }

        return false;
    }

    // Function to geocode an address
    public static function geocodeAddress($address) {
        $url = self::GEOCODING_API_URL . '?address=' . urlencode($address) . '&key=' . self::$apiKey;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            return false;
        }

        curl_close($ch);

        $responseData = json_decode($response, true);

        if (isset($responseData['error_message'])) {
            echo 'Error: ' . $responseData['error_message'];
            return false;
        }

        if (isset($responseData['results'][0]['geometry']['location'])) {
            return $responseData['results'][0]['geometry']['location'];
        }

        return false;
    }
}
