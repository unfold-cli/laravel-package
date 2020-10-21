<?php

namespace StubVendor\StubPackage\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Jgile\Messenger\Contracts\Messenger;
use StubVendor\StubPackage\Http\Requests\CreateStubPackageRequest;
use StubVendor\StubPackage\Http\Requests\UpdateStubPackageRequest;
use StubVendor\StubPackage\Http\Resources\StubPackageResource;
use StubVendor\StubPackage\Models\StubPackage;
use StubVendor\StubPackage\Repositories\StubPackageRepository;

class StubPackageController extends Controller
{
    /** @var \Jgile\Messenger\Messenger */
    protected $messenger;

    /** @var \App\Repositories\CartItemRepository */
    protected $repository;

    public function __construct(Messenger $messenger, StubPackageRepository $stub_package_repo)
    {
        $this->messenger = $messenger;
        $this->repository = $stub_package_repo;
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
        $collection = $this->repository->query()->paginate();

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
        $stub_package = $this->repository->create($request->all());
        $this->messenger->success("Stub Package Created.");

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
        if ($stub_package) {
            $this->repository->update($request->all(), $stub_package);
            $this->messenger->success("Stub Package Updated.");

            return new StubPackageResource($stub_package);
        }

        $this->repository->query()->update($request->post());

        return $this->messenger->success("Stub Packages Updated.");
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
        $this->repository->delete($stub_package);
        $this->messenger->success("Stub Package Deleted.");

        return new StubPackageResource($stub_package);
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
        return $this->repository->action($action, $request->post());
    }
}
