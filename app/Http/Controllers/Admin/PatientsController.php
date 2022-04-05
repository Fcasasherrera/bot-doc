<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Patient\BulkDestroyPatient;
use App\Http\Requests\Admin\Patient\DestroyPatient;
use App\Http\Requests\Admin\Patient\IndexPatient;
use App\Http\Requests\Admin\Patient\StorePatient;
use App\Http\Requests\Admin\Patient\UpdatePatient;
use App\Models\Patient;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PatientsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPatient $request
     * @return array|Factory|View
     */
    public function index(IndexPatient $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Patient::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'nss', 'birthdate', 'sex', 'enabled'],

            // set columns to searchIn
            ['id', 'name', 'nss', 'sex']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.patient.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.patient.create');

        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePatient $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePatient $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Patient
        $patient = Patient::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/patients'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/patients');
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @throws AuthorizationException
     * @return void
     */
    public function show(Patient $patient)
    {
        $this->authorize('admin.patient.show', $patient);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Patient $patient
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Patient $patient)
    {
        $this->authorize('admin.patient.edit', $patient);


        return view('admin.patient.edit', [
            'patient' => $patient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePatient $request
     * @param Patient $patient
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePatient $request, Patient $patient)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Patient
        $patient->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/patients'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPatient $request
     * @param Patient $patient
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPatient $request, Patient $patient)
    {
        $patient->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPatient $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPatient $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('patients')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
