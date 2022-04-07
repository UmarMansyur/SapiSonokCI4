<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\Auth;
use App\Filters\FilterAdmin;
use App\Filters\FilterPeternak;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'auth'          => Auth::class,
        'FilterPeternak' => FilterPeternak::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            'csrf',
            // 'invalidchars',
            // 'FilterAdmin' => [
            //     'except' => [
            //         '/login',

            //         '/aksesoris',
            //         '/aksesoris/*', 
            //         '/berita', '/berita/*', 
            //         '/peternak', 
            //         '/peternak/*',


            //     ]
            // ],
            'FilterPeternak' => [
                'except' => [
                    '/login',
                    '/logout',
                    '/profile',
                    '/profile/*',
                    '/sapi',
                    '/sapi/*',
                    '/pasangan',
                    '/pasangan/*',
                    '/prestasi',
                    '/prestasi/*',
                    '/pasar',
                    '/pasar/*',
                    '/penawaran',
                    '/penawaran/*',
                    '/detail_penawaran',
                    '/detail_penawaran/*'
                ]
            ]
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
            'FilterPeternak' => [
                'except' => [
                    '/profile',
                    '/profile/*',
                    '/login',
                    '/logout',
                    '/sapi',
                    '/sapi/*',
                    '/pasangan',
                    '/pasangan/*',
                    '/prestasi',
                    '/prestasi/*',
                    '/pasar',
                    '/pasar/*',
                    '/penawaran',
                    '/penawaran/*',
                    '/detail_penawaran',
                    '/detail_penawaran/*'
                ]
            ],
            // 'FilterAdmin' => [
            //     'except' => [
            //         '/login',

            //         '/aksesoris',
            //         '/aksesoris/*', 
            //         '/berita', 
            //         '/berita/*', 
            //         '/peternak', 
            //         '/peternak/*',


            //     ]
            // ],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
