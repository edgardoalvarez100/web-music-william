<?php

return [
  'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => env('APP_NAME', 'Laravel'), // set false to total remove
            'description'  => env('SEO_DESCRIPTION', 'This a site laravel'), // set false to total remove
            'separator'    => ' - ',
            'keywords'     => env('SEO_KEYWORDS', ['key1','key2','key3']),
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
          ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
          'google'    => null,
          'bing'      => null,
          'alexa'     => null,
          'pinterest' => null,
          'yandex'    => null,
        ],
      ],
      'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => env('APP_NAME', 'Laravel'), // set false to total remove
            'description' => env('SEO_DESCRIPTION', 'This a site laravel'), // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
          ],
        ],
        'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
      ],
    ];
