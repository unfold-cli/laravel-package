<?php

namespace StubVendor\StubPackage\Http\Controllers;

use App\Repositories\CartItemRepository;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Jgile\Messenger\Contracts\Messenger;
use StubVendor\StubPackage\Http\Requests\CreateStubPackageRequest;
use StubVendor\StubPackage\Http\Requests\UpdateStubPackageRequest;
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
     * @return Response
     */
    public function index()
    {
        $this->authorize('list', StubPackage::class);
        $stub_packages = $this->repository->query()->get();

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
        $this->authorize('create', StubPackage::class);

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
        $stub_package = $this->repository->create($request->all());

        return redirect()->name("stub-vendor.stub-package.show", ['stub_package' => $stub_package->id]);
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

        return view('stub-package::edit', ['stub_package' => $stub_package]);
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
        $this->repository->update($request->all(), $stub_package);
        $this->messenger->success("Stub Package Updated.");

        return redirect()->name("stub-vendor.stub-package.show", ['stub_package' => $stub_package->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \StubVendor\StubPackage\Models\StubPackage  $stub_package
     *
     * @return \StubVendor\StubPackage\Http\Resources\StubPackageResource
     */
    public function destroy(StubPackage $stub_package)
    {
        $this->authorize('delete', $stub_package);
        $this->repository->delete($stub_package);
        $this->messenger->success("Stub Package Deleted.");

        return redirect()->name("stub-vendor.stub-package.index");
    }
}
