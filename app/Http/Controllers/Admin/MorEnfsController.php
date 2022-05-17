<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MorEnf\BulkDestroyMorEnf;
use App\Http\Requests\Admin\MorEnf\DestroyMorEnf;
use App\Http\Requests\Admin\MorEnf\IndexMorEnf;
use App\Http\Requests\Admin\MorEnf\StoreMorEnf;
use App\Http\Requests\Admin\MorEnf\UpdateMorEnf;
use App\Models\MorEnf;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MorEnfsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMorEnf $request
     * @return array|Factory|View
     */
    public function index(IndexMorEnf $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MorEnf::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idPruebaMor', 'idEnfermedad'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.mor-enf.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.mor-enf.create');

        return view('admin.mor-enf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMorEnf $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMorEnf $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MorEnf
        $morEnf = MorEnf::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/mor-enfs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/mor-enfs');
    }

    /**
     * Display the specified resource.
     *
     * @param MorEnf $morEnf
     * @throws AuthorizationException
     * @return void
     */
    public function show(MorEnf $morEnf)
    {
        $this->authorize('admin.mor-enf.show', $morEnf);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MorEnf $morEnf
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MorEnf $morEnf)
    {
        $this->authorize('admin.mor-enf.edit', $morEnf);


        return view('admin.mor-enf.edit', [
            'morEnf' => $morEnf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMorEnf $request
     * @param MorEnf $morEnf
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMorEnf $request, MorEnf $morEnf)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MorEnf
        $morEnf->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/mor-enfs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/mor-enfs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMorEnf $request
     * @param MorEnf $morEnf
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMorEnf $request, MorEnf $morEnf)
    {
        $morEnf->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMorEnf $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMorEnf $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MorEnf::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
