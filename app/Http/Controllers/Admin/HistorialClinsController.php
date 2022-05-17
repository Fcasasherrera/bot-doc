<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HistorialClin\BulkDestroyHistorialClin;
use App\Http\Requests\Admin\HistorialClin\DestroyHistorialClin;
use App\Http\Requests\Admin\HistorialClin\IndexHistorialClin;
use App\Http\Requests\Admin\HistorialClin\StoreHistorialClin;
use App\Http\Requests\Admin\HistorialClin\UpdateHistorialClin;
use App\Models\HistorialClin;
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

class HistorialClinsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexHistorialClin $request
     * @return array|Factory|View
     */
    public function index(IndexHistorialClin $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(HistorialClin::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idUsuario', 'idPaciente', 'fechaCreacion'],

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

        return view('admin.historial-clin.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.historial-clin.create');

        return view('admin.historial-clin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHistorialClin $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreHistorialClin $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the HistorialClin
        $historialClin = HistorialClin::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/historial-clins'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/historial-clins');
    }

    /**
     * Display the specified resource.
     *
     * @param HistorialClin $historialClin
     * @throws AuthorizationException
     * @return void
     */
    public function show(HistorialClin $historialClin)
    {
        $this->authorize('admin.historial-clin.show', $historialClin);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HistorialClin $historialClin
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(HistorialClin $historialClin)
    {
        $this->authorize('admin.historial-clin.edit', $historialClin);


        return view('admin.historial-clin.edit', [
            'historialClin' => $historialClin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateHistorialClin $request
     * @param HistorialClin $historialClin
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateHistorialClin $request, HistorialClin $historialClin)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values HistorialClin
        $historialClin->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/historial-clins'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/historial-clins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyHistorialClin $request
     * @param HistorialClin $historialClin
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyHistorialClin $request, HistorialClin $historialClin)
    {
        $historialClin->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyHistorialClin $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyHistorialClin $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    HistorialClin::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
