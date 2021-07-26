<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\Admin\ItemResource;
use App\Models\Item;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemResource(Item::advancedFilter());
    }

    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());

        return (new ItemResource($item))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Item $item)
    {
        abort_if(Gate::denies('item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Item $item)
    {
        abort_if(Gate::denies('item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemResource($item);
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());

        return (new ItemResource($item))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Item $item)
    {
        abort_if(Gate::denies('item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ItemResource($item),
            'meta' => [],
        ]);
    }

    public function destroy(Item $item)
    {
        abort_if(Gate::denies('item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
