<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;

class Handler extends ExceptionHandler
{
    private const ROUTE_NOT_FOUND = 'Route not found';
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param \Throwable $exception
     * @return Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        switch (true) {
            case ($exception instanceof BaseException):
                return $this->renderException(['login' => [$exception->getMessage()]], $exception->getCode());
            case ($exception instanceof UnauthorizedHttpException):
                return $this->renderException(['user' => [$exception->getMessage()]], $exception->getCode());
            case ($exception instanceof JWTException):
                return $this->renderException(['token' => [$exception->getMessage()]], JsonResponse::HTTP_UNAUTHORIZED);
            case ($exception instanceof NotFoundHttpException):
                return $this->renderException(['not_found' => [self::ROUTE_NOT_FOUND]], JsonResponse::HTTP_NOT_FOUND);
            default:
                return $this->renderException(['error' => [$exception->getMessage()]], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function renderException(array $errors, int $code): JsonResponse
    {
        $response = [
            'success' => false,
            'data' => [],
            'meta' => [],
            'errors' => $errors,
        ];

        return new JsonResponse($response, $code);
    }
}
