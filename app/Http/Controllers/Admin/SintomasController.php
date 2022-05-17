<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sintoma\BulkDestroySintoma;
use App\Http\Requests\Admin\Sintoma\DestroySintoma;
use App\Http\Requests\Admin\Sintoma\IndexSintoma;
use App\Http\Requests\Admin\Sintoma\StoreSintoma;
use App\Http\Requests\Admin\Sintoma\UpdateSintoma;
use App\Models\Sintoma;
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

class SintomasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSintoma $request
     * @return array|Factory|View
     */
    public function index(IndexSintoma $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Sintoma::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'descSin'],

            // set columns to searchIn
            ['id', 'nombre', 'descSin']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.sintoma.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sintoma.create');

        return view('admin.sintoma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSintoma $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSintoma $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Sintoma
        $sintoma = Sintoma::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sintomas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sintomas');
    }

    /**
     * Display the specified resource.
     *
     * @param Sintoma $sintoma
     * @throws AuthorizationException
     * @return void
     */
    public function show(Sintoma $sintoma)
    {
        $this->authorize('admin.sintoma.show', $sintoma);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sintoma $sintoma
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Sintoma $sintoma)
    {
        $this->authorize('admin.sintoma.edit', $sintoma);


        return view('admin.sintoma.edit', [
            'sintoma' => $sintoma,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSintoma $request
     * @param Sintoma $sintoma
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSintoma $request, Sintoma $sintoma)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Sintoma
        $sintoma->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sintomas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sintomas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySintoma $request
     * @param Sintoma $sintoma
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySintoma $request, Sintoma $sintoma)
    {
        $sintoma->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySintoma $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySintoma $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Sintoma::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
