<?php

namespace StubVendor\StubPackage\Repositories;

use Jgile\LaravelRepositories\BaseRepository;
use StubVendor\StubPackage\Models\StubPackage;

class StubPackageRepository extends BaseRepository
{
    /**
     * Specify StubPackage class name
     *
     * @return string
     */
    protected function model(): string
    {
        return StubPackage::class;
    }
}
