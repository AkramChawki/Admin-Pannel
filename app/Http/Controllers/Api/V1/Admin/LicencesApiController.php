<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLicenceRequest;
use App\Http\Requests\UpdateLicenceRequest;
use App\Http\Resources\Admin\LicenceResource;
use App\Models\Licence;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LicencesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('licence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LicenceResource(Licence::all());
    }

    public function store(StoreLicenceRequest $request)
    {
        $licence = Licence::create($request->all());

        return (new LicenceResource($licence))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Licence $licence)
    {
        abort_if(Gate::denies('licence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LicenceResource($licence);
    }

    public function update(UpdateLicenceRequest $request, Licence $licence)
    {
        $licence->update($request->all());

        return (new LicenceResource($licence))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Licence $licence)
    {
        abort_if(Gate::denies('Licence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $licence->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
