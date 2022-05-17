<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PruebaMortem\BulkDestroyPruebaMortem;
use App\Http\Requests\Admin\PruebaMortem\DestroyPruebaMortem;
use App\Http\Requests\Admin\PruebaMortem\IndexPruebaMortem;
use App\Http\Requests\Admin\PruebaMortem\StorePruebaMortem;
use App\Http\Requests\Admin\PruebaMortem\UpdatePruebaMortem;
use App\Models\PruebaMortem;
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

class PruebaMortemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPruebaMortem $request
     * @return array|Factory|View
     */
    public function index(IndexPruebaMortem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PruebaMortem::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.prueba-mortem.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.prueba-mortem.create');

        return view('admin.prueba-mortem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePruebaMortem $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePruebaMortem $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PruebaMortem
        $pruebaMortem = PruebaMortem::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/prueba-mortems'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/prueba-mortems');
    }

    /**
     * Display the specified resource.
     *
     * @param PruebaMortem $pruebaMortem
     * @throws AuthorizationException
     * @return void
     */
    public function show(PruebaMortem $pruebaMortem)
    {
        $this->authorize('admin.prueba-mortem.show', $pruebaMortem);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PruebaMortem $pruebaMortem
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PruebaMortem $pruebaMortem)
    {
        $this->authorize('admin.prueba-mortem.edit', $pruebaMortem);


        return view('admin.prueba-mortem.edit', [
            'pruebaMortem' => $pruebaMortem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePruebaMortem $request
     * @param PruebaMortem $pruebaMortem
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePruebaMortem $request, PruebaMortem $pruebaMortem)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PruebaMortem
        $pruebaMortem->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/prueba-mortems'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/prueba-mortems');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPruebaMortem $request
     * @param PruebaMortem $pruebaMortem
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPruebaMortem $request, PruebaMortem $pruebaMortem)
    {
        $pruebaMortem->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPruebaMortem $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPruebaMortem $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PruebaMortem::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
