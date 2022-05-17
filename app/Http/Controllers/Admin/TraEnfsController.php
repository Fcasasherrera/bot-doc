<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TraEnf\BulkDestroyTraEnf;
use App\Http\Requests\Admin\TraEnf\DestroyTraEnf;
use App\Http\Requests\Admin\TraEnf\IndexTraEnf;
use App\Http\Requests\Admin\TraEnf\StoreTraEnf;
use App\Http\Requests\Admin\TraEnf\UpdateTraEnf;
use App\Models\TraEnf;
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

class TraEnfsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTraEnf $request
     * @return array|Factory|View
     */
    public function index(IndexTraEnf $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TraEnf::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idTratamiento', 'idEnfermedad'],

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

        return view('admin.tra-enf.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tra-enf.create');

        return view('admin.tra-enf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTraEnf $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTraEnf $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TraEnf
        $traEnf = TraEnf::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tra-enfs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tra-enfs');
    }

    /**
     * Display the specified resource.
     *
     * @param TraEnf $traEnf
     * @throws AuthorizationException
     * @return void
     */
    public function show(TraEnf $traEnf)
    {
        $this->authorize('admin.tra-enf.show', $traEnf);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TraEnf $traEnf
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TraEnf $traEnf)
    {
        $this->authorize('admin.tra-enf.edit', $traEnf);


        return view('admin.tra-enf.edit', [
            'traEnf' => $traEnf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTraEnf $request
     * @param TraEnf $traEnf
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTraEnf $request, TraEnf $traEnf)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TraEnf
        $traEnf->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tra-enfs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tra-enfs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTraEnf $request
     * @param TraEnf $traEnf
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTraEnf $request, TraEnf $traEnf)
    {
        $traEnf->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTraEnf $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTraEnf $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TraEnf::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
