<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tratamiento\BulkDestroyTratamiento;
use App\Http\Requests\Admin\Tratamiento\DestroyTratamiento;
use App\Http\Requests\Admin\Tratamiento\IndexTratamiento;
use App\Http\Requests\Admin\Tratamiento\StoreTratamiento;
use App\Http\Requests\Admin\Tratamiento\UpdateTratamiento;
use App\Models\Tratamiento;
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

class TratamientosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTratamiento $request
     * @return array|Factory|View
     */
    public function index(IndexTratamiento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Tratamiento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'descTrat'],

            // set columns to searchIn
            ['id', 'nombre', 'descTrat']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tratamiento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tratamiento.create');

        return view('admin.tratamiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTratamiento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTratamiento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Tratamiento
        $tratamiento = Tratamiento::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tratamientos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tratamientos');
    }

    /**
     * Display the specified resource.
     *
     * @param Tratamiento $tratamiento
     * @throws AuthorizationException
     * @return void
     */
    public function show(Tratamiento $tratamiento)
    {
        $this->authorize('admin.tratamiento.show', $tratamiento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tratamiento $tratamiento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Tratamiento $tratamiento)
    {
        $this->authorize('admin.tratamiento.edit', $tratamiento);


        return view('admin.tratamiento.edit', [
            'tratamiento' => $tratamiento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTratamiento $request
     * @param Tratamiento $tratamiento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTratamiento $request, Tratamiento $tratamiento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Tratamiento
        $tratamiento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tratamientos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tratamientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTratamiento $request
     * @param Tratamiento $tratamiento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTratamiento $request, Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTratamiento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTratamiento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Tratamiento::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
