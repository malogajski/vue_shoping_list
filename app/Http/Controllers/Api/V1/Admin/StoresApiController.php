<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Resources\Admin\StoreResource;
use App\Models\Store;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoresApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('store_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StoreResource(Store::advancedFilter());
    }

    public function store(StoreStoreRequest $request)
    {
        $store = Store::create($request->validated());

        return (new StoreResource($store))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Store $store)
    {
        abort_if(Gate::denies('store_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Store $store)
    {
        abort_if(Gate::denies('store_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StoreResource($store);
    }

    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->validated());

        return (new StoreResource($store))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Store $store)
    {
        abort_if(Gate::denies('store_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new StoreResource($store),
            'meta' => [],
        ]);
    }

    public function destroy(Store $store)
    {
        abort_if(Gate::denies('store_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
