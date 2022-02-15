<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLicenceRequest;
use App\Http\Requests\StoreLicenceRequest;
use App\Http\Requests\UpdateLicenceRequest;
use App\Models\Client;
use App\Models\Licence;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LicencesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('licence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $licences = Licence::all();

        return view('admin.Sage.licences.index', compact('licences'));
    }

    public function create()
    {
        abort_if(Gate::denies('licence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $clients = Client::all();

        return view('admin.Sage.Licences.create', compact('clients'));
    }

    public function store(StoreLicenceRequest $request)
    {
        $licence = Licence::create($request->all());

        return redirect()->route('admin.licences.index')->with('toast_success', 'Licence Added Successfully!');
    }

    public function edit(Licence $licence)
    {
        abort_if(Gate::denies('licence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $clients = Client::all();
        $licence->load('clients');

        return view('admin.Sage.Licences.edit', compact('licence', 'clients'));
    }

    public function update(UpdateLicenceRequest $request, Licence $licence)
    {
        $licence->update($request->all());

        return redirect()->route('admin.licences.index')->with('toast_success', 'Licence Updated Successfully!');
    }

    public function show(Licence $licence)
    {
        abort_if(Gate::denies('licence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $licence->load('clients');

        return view('admin.Sage.Licences.show', compact('licence'));
    }

    public function destroy(Licence $licence)
    {
        abort_if(Gate::denies('licence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $licence->delete();

        return back();
    }

    public function massDestroy(MassDestroyLicenceRequest $request)
    {
        Licence::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
