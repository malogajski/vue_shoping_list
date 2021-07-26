<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Http\Resources\Admin\OrderItemResource;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Store;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderItemsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderItemResource(OrderItem::with(['order', 'store', 'item'])->advancedFilter());
    }

    public function store(StoreOrderItemRequest $request)
    {
        $orderItem = OrderItem::create($request->validated());

        return (new OrderItemResource($orderItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'order' => Order::get(['id', 'number']),
                'store' => Store::get(['id', 'title']),
                'item'  => Item::get(['id', 'title']),
            ],
        ]);
    }

    public function show(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderItemResource($orderItem->load(['order', 'store', 'item']));
    }

    public function update(UpdateOrderItemRequest $request, OrderItem $orderItem)
    {
        $orderItem->update($request->validated());

        return (new OrderItemResource($orderItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new OrderItemResource($orderItem->load(['order', 'store', 'item'])),
            'meta' => [
                'order' => Order::get(['id', 'number']),
                'store' => Store::get(['id', 'title']),
                'item'  => Item::get(['id', 'title']),
            ],
        ]);
    }

    public function destroy(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
