<?php

namespace StubVendor\StubPackage\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use StubVendor\StubPackage\Http\Requests\CreateStubPackageRequest;
use StubVendor\StubPackage\Http\Requests\UpdateStubPackageRequest;
use StubVendor\StubPackage\Http\Resources\StubPackageResource;
use StubVendor\StubPackage\Models\StubPackage;
use StubVendor\StubPackage\Repositories\StubPackageRepository;

class StubPackageController extends Controller
{
    /**
     * @var \StubVendor\StubPackage\Repositories\StubPackageRepository
     */
    protected $stub_package;

    public function __construct(StubPackageRepository $stub_package)
    {
        $this->stub_package = $stub_package;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('list', StubPackage::class);

        $stub_packages = $this->stub_package->query()->get();

        return view('stub-package::index', [
            'stub_packages' => $stub_packages,
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  \StubVendor\StubPackage\Models\StubPackage  $stub_package
     *
     * @return Response
     */
    public function show(StubPackage $stub_package)
    {
        $this->authorize('view', $stub_package);

        return view('stub-package::show', [
            'stub_package' => $stub_package,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('stub-package::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \StubVendor\StubPackage\Http\Requests\CreateStubPackageRequest  $request
     *
     * @return Response
     */
    public function store(CreateStubPackageRequest $request)
    {
        $stub_package = $this->stub_package->create($request->all());

        return StubPackageResource::make($stub_package);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \StubVendor\StubPackage\Models\StubPackage  $stub_package
     *
     * @return Response
     */
    public function edit(StubPackage $stub_package)
    {
        $this->authorize('update', $stub_package);

        return view('stub-package::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \StubVendor\StubPackage\Http\Requests\UpdateStubPackageRequest  $request
     * @param  \StubVendor\StubPackage\Models\StubPackage  $stub_package
     *
     * @return Response
     */
    public function update(UpdateStubPackageRequest $request, StubPackage $stub_package)
    {
        $stub_package = $this->stub_package->update($request->all(), $stub_package);

        return StubPackageResource::make($stub_package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \StubVendor\StubPackage\Models\StubPackage  $stub_package
     *
     * @return Response
     */
    public function destroy(StubPackage $stub_package)
    {
        $this->authorize('delete', $stub_package);

        return response()->json();
    }


}
