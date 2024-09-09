protected $routeMiddleware = [
    // ...
    'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
];
