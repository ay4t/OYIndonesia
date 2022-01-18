<?php

namespace ay4t\OYIndonesia;

/*
 * File: Config.php
 * Project: src
 * Created Date: Tu Jan 2022
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
 */

class Config
{
    /**
     * $apiKey
     * ApiKey dari OYIndonesia
     * @var string
     */
    public $apiKey = 'cac87047-ae3c-463b-b0f2-e545ba853723';

    /**
     * $username
     * OY username Header
     * @var string
     */
    public $username = 'aahadr';

    /**
     * $base_staging
     * API Base URL : Staging Environment: https://api-stg.oyindonesia.com
     * @var string
     */
    public $base_staging        = 'https://api-stg.oyindonesia.com/api/';

    /**
     * $base_production
     * API Base URL : Production Environment: https://partner.oyindonesia.com
     * @var string
     */
    public $base_production     = 'https://api-stg.oyindonesia.com/api/';
}
