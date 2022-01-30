<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoucherRequest;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use App\Services\VoucherService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

/**
 *
 */
class VouchersController extends Controller {

    /**
     * @return Response|ResponseFactory
     */
    public function index(): Response|ResponseFactory
    {

        return inertia("Voucher/VoucherIndex", [
            "vouchers" => VoucherResource::collection(
                Voucher::query()
                    ->filter(request()->only("search"))
                    ->orderBy(request('sort') ?? 'name', request("order") ?? "asc")
                    ->paginate(request("limit") ?? 10)
                    ->withQueryString()
            ),
            'filters' => request()->all('search', "sort", "order"),
        ]);
    }

    /**
     * @return Response|ResponseFactory
     */
    public function create(): Response|ResponseFactory
    {
        return inertia("Voucher/VoucherCreate");
    }

    /**
     * @param VoucherRequest $request
     * @param VoucherService $service
     * @return RedirectResponse
     */
    public function store(VoucherRequest $request, VoucherService $service): RedirectResponse
    {

        $newService = $service->save($request);

        return redirect()->back()->with("success", "$newService->name created");

    }

    /**
     * @param Voucher $voucher
     * @return Response|ResponseFactory
     */
    public function edit(Voucher $voucher): Response|ResponseFactory
    {

        return inertia("Voucher/VoucherEdit",
            ["voucher" => $voucher->load("courier.courierable")]
        );
    }

    /**
     * @param VoucherRequest $request
     * @param Voucher $voucher
     * @param VoucherService $service
     * @return RedirectResponse
     */
    public function update(VoucherRequest $request, Voucher $voucher, VoucherService $service): RedirectResponse
    {
        $updatedService = $service->update($request, $voucher);

        return redirect()->back()->with("success", "$updatedService->name created");
    }




}