<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PruebaLab\BulkDestroyPruebaLab;
use App\Http\Requests\Admin\PruebaLab\DestroyPruebaLab;
use App\Http\Requests\Admin\PruebaLab\IndexPruebaLab;
use App\Http\Requests\Admin\PruebaLab\StorePruebaLab;
use App\Http\Requests\Admin\PruebaLab\UpdatePruebaLab;
use App\Models\PruebaLab;
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

class PruebaLabsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPruebaLab $request
     * @return array|Factory|View
     */
    public function index(IndexPruebaLab $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PruebaLab::class)->processRequestAndGet(
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

        return view('admin.prueba-lab.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.prueba-lab.create');

        return view('admin.prueba-lab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePruebaLab $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePruebaLab $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PruebaLab
        $pruebaLab = PruebaLab::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/prueba-labs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/prueba-labs');
    }

    /**
     * Display the specified resource.
     *
     * @param PruebaLab $pruebaLab
     * @throws AuthorizationException
     * @return void
     */
    public function show(PruebaLab $pruebaLab)
    {
        $this->authorize('admin.prueba-lab.show', $pruebaLab);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PruebaLab $pruebaLab
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PruebaLab $pruebaLab)
    {
        $this->authorize('admin.prueba-lab.edit', $pruebaLab);


        return view('admin.prueba-lab.edit', [
            'pruebaLab' => $pruebaLab,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePruebaLab $request
     * @param PruebaLab $pruebaLab
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePruebaLab $request, PruebaLab $pruebaLab)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PruebaLab
        $pruebaLab->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/prueba-labs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/prueba-labs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPruebaLab $request
     * @param PruebaLab $pruebaLab
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPruebaLab $request, PruebaLab $pruebaLab)
    {
        $pruebaLab->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPruebaLab $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPruebaLab $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PruebaLab::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
