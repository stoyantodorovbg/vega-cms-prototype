<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Group;
use App\Models\Route;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminDeleteRequest;
use App\Services\Interfaces\GroupServiceInterface;
use App\Services\Interfaces\RouteServiceInterface;

class DeleteController extends Controller
{
    /**
     * Destroy a model
     *
     * @param string $modelName
     * @param int $id
     * @param string $method
     * @return JsonResponse
     */
    public function destroy(AdminDeleteRequest $request, string $methodName = '')
    {
        $modelPath = '\\App\\Models\\' . Str::studly($request->modelName);
        $method = strtolower($request->modelName);
        $methodExists = method_exists($this, $method);
        if(!$methodExists && $model = $modelPath::find($request->slug)) {
            $model->delete();

            return response()->json([
                'success' => true,
                'message' => phrase('messages.deleted')
            ]);
        }

        if($methodExists && $result = $this->$method($request->slug)) {
            return $result;
        }

        return response()->json([
            'success' => false,
            'message' => phrase('messages.not_found')
        ]);
    }

    /**
     * Destroy a group
     *
     * @param int $id
     * @return bool|JsonResponse
     */
    protected function group(int $id)
    {
        if($group = Group::find($id)) {
            $groupService = resolve(GroupServiceInterface::class);
            $groupService = $groupService->destroy([
                'title' => $group->title
            ], $group);

            return response()->json([
                'success' => true,
                'message' => phrase('messages.deleted')
            ]);
        }

        return false;
    }

    /**
     * Destroy a route
     *
     * @param int $id
     * @return mixed
     */
    protected function route(int $id)
    {
        if($route = Route::find($id)) {
            $routeService = resolve(RouteServiceInterface::class);
            $routeService->destroy([
                'name' => $route->name
            ]);

            return response()->json([
                'success' => true,
                'message' => phrase('messages.deleted')
            ]);
        }

        return false;
    }
}
