<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paciente\BulkDestroyPaciente;
use App\Http\Requests\Admin\Paciente\DestroyPaciente;
use App\Http\Requests\Admin\Paciente\IndexPaciente;
use App\Http\Requests\Admin\Paciente\StorePaciente;
use App\Http\Requests\Admin\Paciente\UpdatePaciente;
use App\Models\Paciente;
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

class PacientesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPaciente $request
     * @return array|Factory|View
     */
    public function index(IndexPaciente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Paciente::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'nss', 'fechaNac', 'sexo'],

            // set columns to searchIn
            ['id', 'nombre', 'nss', 'sexo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.paciente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.paciente.create');

        return view('admin.paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePaciente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePaciente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Paciente
        $paciente = Paciente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pacientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param Paciente $paciente
     * @throws AuthorizationException
     * @return void
     */
    public function show(Paciente $paciente)
    {
        $this->authorize('admin.paciente.show', $paciente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Paciente $paciente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Paciente $paciente)
    {
        $this->authorize('admin.paciente.edit', $paciente);


        return view('admin.paciente.edit', [
            'paciente' => $paciente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePaciente $request
     * @param Paciente $paciente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePaciente $request, Paciente $paciente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Paciente
        $paciente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pacientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPaciente $request
     * @param Paciente $paciente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPaciente $request, Paciente $paciente)
    {
        $paciente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPaciente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPaciente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Paciente::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
