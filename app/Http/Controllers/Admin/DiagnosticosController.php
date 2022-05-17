<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Diagnostico\BulkDestroyDiagnostico;
use App\Http\Requests\Admin\Diagnostico\DestroyDiagnostico;
use App\Http\Requests\Admin\Diagnostico\IndexDiagnostico;
use App\Http\Requests\Admin\Diagnostico\StoreDiagnostico;
use App\Http\Requests\Admin\Diagnostico\UpdateDiagnostico;
use App\Models\Diagnostico;
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

class DiagnosticosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDiagnostico $request
     * @return array|Factory|View
     */
    public function index(IndexDiagnostico $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Diagnostico::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idCita', 'idEnfermedad', 'idPruebaLab', 'idPruebaMor', 'idTratamiento', 'detalles'],

            // set columns to searchIn
            ['id', 'detalles']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.diagnostico.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.diagnostico.create');

        return view('admin.diagnostico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDiagnostico $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDiagnostico $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Diagnostico
        $diagnostico = Diagnostico::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/diagnosticos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/diagnosticos');
    }

    /**
     * Display the specified resource.
     *
     * @param Diagnostico $diagnostico
     * @throws AuthorizationException
     * @return void
     */
    public function show(Diagnostico $diagnostico)
    {
        $this->authorize('admin.diagnostico.show', $diagnostico);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Diagnostico $diagnostico
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Diagnostico $diagnostico)
    {
        $this->authorize('admin.diagnostico.edit', $diagnostico);


        return view('admin.diagnostico.edit', [
            'diagnostico' => $diagnostico,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDiagnostico $request
     * @param Diagnostico $diagnostico
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDiagnostico $request, Diagnostico $diagnostico)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Diagnostico
        $diagnostico->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/diagnosticos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/diagnosticos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDiagnostico $request
     * @param Diagnostico $diagnostico
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDiagnostico $request, Diagnostico $diagnostico)
    {
        $diagnostico->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDiagnostico $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDiagnostico $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Diagnostico::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
