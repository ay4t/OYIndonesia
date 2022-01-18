<?php

namespace ay4t\OYIndonesia;

/*
 * File: OYIndonesia.php
 * Project: src
 * Created Date: Mo Jan 2022
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Tue Jan 18 2022
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2022 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 * 
 * Modul ini dibuat untuk membantu pembayaran otomatis dengan virtual akun melalui pihak ketiga vendor OYIndonesia
 * library atau modul Ini Membutuhkan ekstensi PHP CURL
 * 
 */

class OYIndonesia
{

    /**
     * $isProduction
     * pilih environment antara Production atau Testnet
     * @var bool
     */
    protected $isProduction = true;

    /**
     * $apiKey
     * ApiKey Header OYIndonesia
     * @var string
     */
    protected $apiKey;

    /**
     * $OYusername
     * OY Username Header
     * @var string
     */
    protected $OYusername;

    /**
     * $config
     *
     * @var mixed
     */
    protected $config;

    /**
     * $base
     * demo: https://partner.oyindonesia.com/api/
     * production: https://api-stg.oyindonesia.com/api/
     * @var string
     */
    protected $base;

    /**
     * $endpoint
     * URI endpoint
     * @var string
     */
    protected $endpoint;

    /**
     * $method_type
     * method HTTP request
     * @var string
     */
    protected $method_type = 'POST';


    /**
     * $result
     *
     * @var array
     */
    protected $result = [];

    public function __construct($apiKey = null)
    {

        /** set apiKey dari file Config */
        $this->config = new Config;
        $this->setApiKey($this->config->apiKey);
        $this->setOYusername($this->config->username);

        /** set Base URL API */
        $base = $this->config->base_production;
        if (!$this->isProduction) $base = $this->config->base_staging;
        $this->setBase($base);
    }


    public function exec($params = [])
    {

        $requestBody = json_encode($params);
        $url        = $this->base . $this->getEndpoint();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Accept: application/json';
        $headers[] = 'X-Oy-Username: ' . $this->getOYusername();
        $headers[] = 'X-Api-Key: ' . $this->getApiKey();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return [
                'status' => false,
                'message' => curl_error($ch)
            ];
        }
        curl_close($ch);
        return json_decode($result);
    }

    /**
     * Get method HTTP request
     *
     * @return  string
     */
    public function getMethod_type()
    {
        return $this->method_type;
    }

    /**
     * Set method HTTP request
     *
     * @param  string  $method_type  method HTTP request
     *
     * @return  self
     */
    public function setMethod_type(string $method_type)
    {
        $this->method_type = $method_type;
        return $this;
    }

    /**
     * Get uRI endpoint
     *
     * @return  string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Set uRI endpoint
     *
     * @param  string  $endpoint  URI endpoint
     *
     * @return  self
     */
    public function setEndpoint(string $endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Get apiKey dari OYIndonesia
     *
     * @return  string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set apiKey dari OYIndonesia
     *
     * @param  string  $apiKey  ApiKey dari OYIndonesia
     *
     * @return  self
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Get pilih environment antara Production atau Testnet
     *
     * @return  bool
     */
    public function getIsProduction()
    {
        return $this->isProduction;
    }

    /**
     * Set pilih environment antara Production atau Testnet
     *
     * @param  bool  $isProduction  pilih environment antara Production atau Testnet
     *
     * @return  self
     */
    public function setIsProduction(bool $isProduction)
    {
        $this->isProduction = $isProduction;
        return $this;
    }

    /**
     * Get oY Username Header
     *
     * @return  string
     */
    public function getOYusername()
    {
        return $this->OYusername;
    }

    /**
     * Set oY Username Header
     *
     * @param  string  $OYusername  OY Username Header
     *
     * @return  self
     */
    public function setOYusername(string $OYusername)
    {
        $this->OYusername = $OYusername;
        return $this;
    }

    /**
     * Get production: https://api-stg.oyindonesia.com/api/
     *
     * @return  string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Set production: https://api-stg.oyindonesia.com/api/
     *
     * @param  string  $base  production: https://api-stg.oyindonesia.com/api/
     *
     * @return  self
     */
    public function setBase(string $base)
    {
        $this->base = $base;
        return $this;
    }
}
