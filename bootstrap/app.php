<?php

use App\Models\Tool;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn(Request $request) => $request->is('api/*'),
        );

        $exceptions->render(function (NotFoundHttpException $e, $request) {
            $tools = Tool::where('status', 'active')
                ->orderByRaw("
                        FIELD(badge,
                            'new',
                            'popular',
                            'most used',
                            'trending',
                            'top rated',
                            '#1 tool',
                            'featured'
                        )
                    ")
                ->take(3)
                ->get();

            return response()
                ->view('errors.404', compact('tools'), 404);
        });
    })->create();
