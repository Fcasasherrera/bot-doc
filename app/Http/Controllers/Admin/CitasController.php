<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cita\BulkDestroyCita;
use App\Http\Requests\Admin\Cita\DestroyCita;
use App\Http\Requests\Admin\Cita\IndexCita;
use App\Http\Requests\Admin\Cita\StoreCita;
use App\Http\Requests\Admin\Cita\UpdateCita;
use App\Models\Cita;
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

class CitasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCita $request
     * @return array|Factory|View
     */
    public function index(IndexCita $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cita::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idHistorial', 'idSigno', 'idSintoma', 'fechaCita', 'detalles'],

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

        return view('admin.cita.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cita.create');

        return view('admin.cita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCita $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCita $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Cita
        $citum = Cita::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/citas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/citas');
    }

    /**
     * Display the specified resource.
     *
     * @param Cita $citum
     * @throws AuthorizationException
     * @return void
     */
    public function show(Cita $citum)
    {
        $this->authorize('admin.cita.show', $citum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cita $citum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Cita $citum)
    {
        $this->authorize('admin.cita.edit', $citum);


        return view('admin.cita.edit', [
            'citum' => $citum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCita $request
     * @param Cita $citum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCita $request, Cita $citum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Cita
        $citum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/citas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/citas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCita $request
     * @param Cita $citum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCita $request, Cita $citum)
    {
        $citum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCita $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCita $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Cita::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
