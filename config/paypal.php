<?php
return array(
    // set your paypal credential
    'client_id' => 'Aanh9btFWYGrUpps0-yZ9DxoMiiO_igDG0TeS1Dz5vIwbdBpxzqO66ChXwBUUITSSbu0OQlnQoOEH7dB',
    'secret' => 'EAwq9mwmFGR_kP6mng9Hr0tiTZqH_CDfw_5JK0cC-XqlUShkLqde_rR7mwWtgQWfJ9l7JT03J9-nMAoE',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);