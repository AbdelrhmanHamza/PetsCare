<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServicePackageRequest;
use App\Http\Requests\UpdateServicePackageRequest;
use App\Repositories\ServicePackageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ServicePackageController extends AppBaseController
{
    /** @var ServicePackageRepository $servicePackageRepository*/
    private $servicePackageRepository;

    public function __construct(ServicePackageRepository $servicePackageRepo)
    {
        $this->servicePackageRepository = $servicePackageRepo;
    }

    /**
     * Display a listing of the ServicePackage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $servicePackages = $this->servicePackageRepository->all();

        return view('service_packages.index')
            ->with('servicePackages', $servicePackages);
    }

    /**
     * Show the form for creating a new ServicePackage.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_packages.create');
    }

    /**
     * Store a newly created ServicePackage in storage.
     *
     * @param CreateServicePackageRequest $request
     *
     * @return Response
     */
    public function store(CreateServicePackageRequest $request)
    {
        $input = $request->all();

        $servicePackage = $this->servicePackageRepository->create($input);

        Flash::success('Service Package saved successfully.');

        return redirect(route('servicePackages.index'));
    }

    /**
     * Display the specified ServicePackage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $servicePackage = $this->servicePackageRepository->find($id);

        if (empty($servicePackage)) {
            Flash::error('Service Package not found');

            return redirect(route('servicePackages.index'));
        }

        return view('service_packages.show')->with('servicePackage', $servicePackage);
    }

    /**
     * Show the form for editing the specified ServicePackage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servicePackage = $this->servicePackageRepository->find($id);

        if (empty($servicePackage)) {
            Flash::error('Service Package not found');

            return redirect(route('servicePackages.index'));
        }

        return view('service_packages.edit')->with('servicePackage', $servicePackage);
    }

    /**
     * Update the specified ServicePackage in storage.
     *
     * @param int $id
     * @param UpdateServicePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicePackageRequest $request)
    {
        $servicePackage = $this->servicePackageRepository->find($id);

        if (empty($servicePackage)) {
            Flash::error('Service Package not found');

            return redirect(route('servicePackages.index'));
        }

        $servicePackage = $this->servicePackageRepository->update($request->all(), $id);

        Flash::success('Service Package updated successfully.');

        return redirect(route('servicePackages.index'));
    }

    /**
     * Remove the specified ServicePackage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $servicePackage = $this->servicePackageRepository->find($id);

        if (empty($servicePackage)) {
            Flash::error('Service Package not found');

            return redirect(route('servicePackages.index'));
        }

        $this->servicePackageRepository->delete($id);

        Flash::success('Service Package deleted successfully.');

        return redirect(route('servicePackages.index'));
    }
}
