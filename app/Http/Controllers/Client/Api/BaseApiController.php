<?php

namespace App\Http\Controllers\Client\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseApiController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected $limit = 20;

    /**
     * Set pagination limit.
     *
     * @param $page
     * @return int
     */
    protected function setLimit($limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns requested offer by page.
     *
     * @param $page
     * @return int
     */
    protected function getOffset($page): int
    {
        return $this->limit * ($page - 1);
    }

    public function paginatedResponse($data, $total, $offset): array
    {
        if (!count($data)) {
            return [
                'data' => [],
                'total' => $total,
                'from' => null,
                'to' => null,
                'count' => 0,
            ];
        }

        return [
            'data' => $data,
            'total' => $total,
            'from' => $offset + 1,
            'to' => $offset + count($data),
            'count' => count($data),
        ];
    }

    public function jsonResponse($data): array
    {
        if (!count($data)) {
            return [
                'data' => [],
            ];
        }

        return [
            'data' => $data,
        ];
    }

    public function abortWithJson($message, $status = 500)
    {
        return response()->json([
            'message' => $message,
        ], $status);
    }
}
