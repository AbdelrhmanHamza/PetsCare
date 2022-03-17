<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscribtionPackageRequest;
use App\Http\Requests\UpdateSubscribtionPackageRequest;
use App\Repositories\SubscribtionPackageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubscribtionPackageController extends AppBaseController
{
    /** @var SubscribtionPackageRepository $subscribtionPackageRepository*/
    private $subscribtionPackageRepository;

    public function __construct(SubscribtionPackageRepository $subscribtionPackageRepo)
    {
        $this->subscribtionPackageRepository = $subscribtionPackageRepo;
    }

    /**
     * Display a listing of the SubscribtionPackage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subscribtionPackages = $this->subscribtionPackageRepository->all();

        return view('subscribtion_packages.index')
            ->with('subscribtionPackages', $subscribtionPackages);
    }

    /**
     * Show the form for creating a new SubscribtionPackage.
     *
     * @return Response
     */
    public function create()
    {
        return view('subscribtion_packages.create');
    }

    /**
     * Store a newly created SubscribtionPackage in storage.
     *
     * @param CreateSubscribtionPackageRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscribtionPackageRequest $request)
    {
        $input = $request->all();

        $subscribtionPackage = $this->subscribtionPackageRepository->create($input);

        Flash::success('Subscribtion Package saved successfully.');

        return redirect(route('subscribtionPackages.index'));
    }

    /**
     * Display the specified SubscribtionPackage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subscribtionPackage = $this->subscribtionPackageRepository->find($id);

        if (empty($subscribtionPackage)) {
            Flash::error('Subscribtion Package not found');

            return redirect(route('subscribtionPackages.index'));
        }

        return view('subscribtion_packages.show')->with('subscribtionPackage', $subscribtionPackage);
    }

    /**
     * Show the form for editing the specified SubscribtionPackage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subscribtionPackage = $this->subscribtionPackageRepository->find($id);

        if (empty($subscribtionPackage)) {
            Flash::error('Subscribtion Package not found');

            return redirect(route('subscribtionPackages.index'));
        }

        return view('subscribtion_packages.edit')->with('subscribtionPackage', $subscribtionPackage);
    }

    /**
     * Update the specified SubscribtionPackage in storage.
     *
     * @param int $id
     * @param UpdateSubscribtionPackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscribtionPackageRequest $request)
    {
        $subscribtionPackage = $this->subscribtionPackageRepository->find($id);

        if (empty($subscribtionPackage)) {
            Flash::error('Subscribtion Package not found');

            return redirect(route('subscribtionPackages.index'));
        }

        $subscribtionPackage = $this->subscribtionPackageRepository->update($request->all(), $id);

        Flash::success('Subscribtion Package updated successfully.');

        return redirect(route('subscribtionPackages.index'));
    }

    /**
     * Remove the specified SubscribtionPackage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subscribtionPackage = $this->subscribtionPackageRepository->find($id);

        if (empty($subscribtionPackage)) {
            Flash::error('Subscribtion Package not found');

            return redirect(route('subscribtionPackages.index'));
        }

        $this->subscribtionPackageRepository->delete($id);

        Flash::success('Subscribtion Package deleted successfully.');

        return redirect(route('subscribtionPackages.index'));
    }
}
