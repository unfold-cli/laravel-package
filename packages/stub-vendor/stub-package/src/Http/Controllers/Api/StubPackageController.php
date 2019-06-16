<?php

namespace StubVendor\StubPackage\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('list', StubPackage::class);

        $collection = $this->stub_package->query()->paginate();

        return StubPackageResource::collection($collection);
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
     * Show the specified resource.
     *
     * @param  \StubVendor\StubPackage\Models\StubPackage  $stub_package
     *
     * @return \StubVendor\StubPackage\Models\StubPackage
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(StubPackage $stub_package)
    {
        $this->authorize('view', $stub_package);

        return StubPackageResource::make($stub_package);
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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(StubPackage $stub_package)
    {
        $this->authorize('delete', $stub_package);

        return response()->json();
    }

    /**
     * Run actions on collection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $action
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function action(Request $request, $action)
    {
        return $this->stub_package->action($action, $request->post());
    }
}
