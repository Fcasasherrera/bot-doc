<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SinEnf\BulkDestroySinEnf;
use App\Http\Requests\Admin\SinEnf\DestroySinEnf;
use App\Http\Requests\Admin\SinEnf\IndexSinEnf;
use App\Http\Requests\Admin\SinEnf\StoreSinEnf;
use App\Http\Requests\Admin\SinEnf\UpdateSinEnf;
use App\Models\SinEnf;
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

class SinEnfsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSinEnf $request
     * @return array|Factory|View
     */
    public function index(IndexSinEnf $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SinEnf::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idSintoma', 'idEnfermedad'],

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

        return view('admin.sin-enf.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sin-enf.create');

        return view('admin.sin-enf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSinEnf $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSinEnf $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SinEnf
        $sinEnf = SinEnf::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sin-enfs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sin-enfs');
    }

    /**
     * Display the specified resource.
     *
     * @param SinEnf $sinEnf
     * @throws AuthorizationException
     * @return void
     */
    public function show(SinEnf $sinEnf)
    {
        $this->authorize('admin.sin-enf.show', $sinEnf);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SinEnf $sinEnf
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SinEnf $sinEnf)
    {
        $this->authorize('admin.sin-enf.edit', $sinEnf);


        return view('admin.sin-enf.edit', [
            'sinEnf' => $sinEnf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSinEnf $request
     * @param SinEnf $sinEnf
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSinEnf $request, SinEnf $sinEnf)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SinEnf
        $sinEnf->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sin-enfs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sin-enfs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySinEnf $request
     * @param SinEnf $sinEnf
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySinEnf $request, SinEnf $sinEnf)
    {
        $sinEnf->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySinEnf $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySinEnf $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SinEnf::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
