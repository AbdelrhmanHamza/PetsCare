<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePetsRequest;
use App\Http\Requests\UpdatePetsRequest;
use App\Repositories\PetsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PetsController extends AppBaseController
{
    /** @var PetsRepository $petsRepository*/
    private $petsRepository;

    public function __construct(PetsRepository $petsRepo)
    {
        $this->petsRepository = $petsRepo;
    }

    /**
     * Display a listing of the Pets.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pets = $this->petsRepository->all();

        return view('pets.index')
            ->with('pets', $pets);
    }

    /**
     * Show the form for creating a new Pets.
     *
     * @return Response
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created Pets in storage.
     *
     * @param CreatePetsRequest $request
     *
     * @return Response
     */
    public function store(CreatePetsRequest $request)
    {
        $input = $request->all();

        $pets = $this->petsRepository->create($input);

        Flash::success('Pets saved successfully.');

        return redirect(route('pets.index'));
    }

    /**
     * Display the specified Pets.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pets = $this->petsRepository->find($id);

        if (empty($pets)) {
            Flash::error('Pets not found');

            return redirect(route('pets.index'));
        }

        return view('pets.show')->with('pets', $pets);
    }

    /**
     * Show the form for editing the specified Pets.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pets = $this->petsRepository->find($id);

        if (empty($pets)) {
            Flash::error('Pets not found');

            return redirect(route('pets.index'));
        }

        return view('pets.edit')->with('pets', $pets);
    }

    /**
     * Update the specified Pets in storage.
     *
     * @param int $id
     * @param UpdatePetsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePetsRequest $request)
    {
        $pets = $this->petsRepository->find($id);

        if (empty($pets)) {
            Flash::error('Pets not found');

            return redirect(route('pets.index'));
        }

        $pets = $this->petsRepository->update($request->all(), $id);

        Flash::success('Pets updated successfully.');

        return redirect(route('pets.index'));
    }

    /**
     * Remove the specified Pets from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pets = $this->petsRepository->find($id);

        if (empty($pets)) {
            Flash::error('Pets not found');

            return redirect(route('pets.index'));
        }

        $this->petsRepository->delete($id);

        Flash::success('Pets deleted successfully.');

        return redirect(route('pets.index'));
    }
}
