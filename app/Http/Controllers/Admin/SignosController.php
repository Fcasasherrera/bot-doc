<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Signo\BulkDestroySigno;
use App\Http\Requests\Admin\Signo\DestroySigno;
use App\Http\Requests\Admin\Signo\IndexSigno;
use App\Http\Requests\Admin\Signo\StoreSigno;
use App\Http\Requests\Admin\Signo\UpdateSigno;
use App\Models\Signo;
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

class SignosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSigno $request
     * @return array|Factory|View
     */
    public function index(IndexSigno $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Signo::class)->processRequestAndGet(
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

        return view('admin.signo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.signo.create');

        return view('admin.signo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSigno $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSigno $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Signo
        $signo = Signo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/signos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/signos');
    }

    /**
     * Display the specified resource.
     *
     * @param Signo $signo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Signo $signo)
    {
        $this->authorize('admin.signo.show', $signo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Signo $signo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Signo $signo)
    {
        $this->authorize('admin.signo.edit', $signo);


        return view('admin.signo.edit', [
            'signo' => $signo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSigno $request
     * @param Signo $signo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSigno $request, Signo $signo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Signo
        $signo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/signos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/signos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySigno $request
     * @param Signo $signo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySigno $request, Signo $signo)
    {
        $signo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySigno $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySigno $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Signo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
