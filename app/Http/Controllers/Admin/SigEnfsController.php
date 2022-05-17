<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SigEnf\BulkDestroySigEnf;
use App\Http\Requests\Admin\SigEnf\DestroySigEnf;
use App\Http\Requests\Admin\SigEnf\IndexSigEnf;
use App\Http\Requests\Admin\SigEnf\StoreSigEnf;
use App\Http\Requests\Admin\SigEnf\UpdateSigEnf;
use App\Models\SigEnf;
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

class SigEnfsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSigEnf $request
     * @return array|Factory|View
     */
    public function index(IndexSigEnf $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SigEnf::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idSigno', 'idEnfermedad'],

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

        return view('admin.sig-enf.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sig-enf.create');

        return view('admin.sig-enf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSigEnf $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSigEnf $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SigEnf
        $sigEnf = SigEnf::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sig-enfs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sig-enfs');
    }

    /**
     * Display the specified resource.
     *
     * @param SigEnf $sigEnf
     * @throws AuthorizationException
     * @return void
     */
    public function show(SigEnf $sigEnf)
    {
        $this->authorize('admin.sig-enf.show', $sigEnf);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SigEnf $sigEnf
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SigEnf $sigEnf)
    {
        $this->authorize('admin.sig-enf.edit', $sigEnf);


        return view('admin.sig-enf.edit', [
            'sigEnf' => $sigEnf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSigEnf $request
     * @param SigEnf $sigEnf
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSigEnf $request, SigEnf $sigEnf)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SigEnf
        $sigEnf->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sig-enfs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sig-enfs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySigEnf $request
     * @param SigEnf $sigEnf
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySigEnf $request, SigEnf $sigEnf)
    {
        $sigEnf->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySigEnf $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySigEnf $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SigEnf::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
