<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LabEnf\BulkDestroyLabEnf;
use App\Http\Requests\Admin\LabEnf\DestroyLabEnf;
use App\Http\Requests\Admin\LabEnf\IndexLabEnf;
use App\Http\Requests\Admin\LabEnf\StoreLabEnf;
use App\Http\Requests\Admin\LabEnf\UpdateLabEnf;
use App\Models\LabEnf;
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

class LabEnfsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLabEnf $request
     * @return array|Factory|View
     */
    public function index(IndexLabEnf $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(LabEnf::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idPruebaLab', 'idEnfermedad'],

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

        return view('admin.lab-enf.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.lab-enf.create');

        return view('admin.lab-enf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLabEnf $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLabEnf $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the LabEnf
        $labEnf = LabEnf::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/lab-enfs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/lab-enfs');
    }

    /**
     * Display the specified resource.
     *
     * @param LabEnf $labEnf
     * @throws AuthorizationException
     * @return void
     */
    public function show(LabEnf $labEnf)
    {
        $this->authorize('admin.lab-enf.show', $labEnf);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LabEnf $labEnf
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LabEnf $labEnf)
    {
        $this->authorize('admin.lab-enf.edit', $labEnf);


        return view('admin.lab-enf.edit', [
            'labEnf' => $labEnf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLabEnf $request
     * @param LabEnf $labEnf
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLabEnf $request, LabEnf $labEnf)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LabEnf
        $labEnf->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/lab-enfs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/lab-enfs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLabEnf $request
     * @param LabEnf $labEnf
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLabEnf $request, LabEnf $labEnf)
    {
        $labEnf->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLabEnf $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLabEnf $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LabEnf::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
