<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Enfermedad\BulkDestroyEnfermedad;
use App\Http\Requests\Admin\Enfermedad\DestroyEnfermedad;
use App\Http\Requests\Admin\Enfermedad\IndexEnfermedad;
use App\Http\Requests\Admin\Enfermedad\StoreEnfermedad;
use App\Http\Requests\Admin\Enfermedad\UpdateEnfermedad;
use App\Models\Enfermedad;
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

class EnfermedadsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEnfermedad $request
     * @return array|Factory|View
     */
    public function index(IndexEnfermedad $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Enfermedad::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'descEnf'],

            // set columns to searchIn
            ['id', 'nombre', 'descEnf']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.enfermedad.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.enfermedad.create');

        return view('admin.enfermedad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEnfermedad $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEnfermedad $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Enfermedad
        $enfermedad = Enfermedad::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/enfermedads'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/enfermedads');
    }

    /**
     * Display the specified resource.
     *
     * @param Enfermedad $enfermedad
     * @throws AuthorizationException
     * @return void
     */
    public function show(Enfermedad $enfermedad)
    {
        $this->authorize('admin.enfermedad.show', $enfermedad);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Enfermedad $enfermedad
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Enfermedad $enfermedad)
    {
        $this->authorize('admin.enfermedad.edit', $enfermedad);


        return view('admin.enfermedad.edit', [
            'enfermedad' => $enfermedad,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEnfermedad $request
     * @param Enfermedad $enfermedad
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEnfermedad $request, Enfermedad $enfermedad)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Enfermedad
        $enfermedad->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/enfermedads'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/enfermedads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEnfermedad $request
     * @param Enfermedad $enfermedad
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEnfermedad $request, Enfermedad $enfermedad)
    {
        $enfermedad->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEnfermedad $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEnfermedad $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Enfermedad::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
