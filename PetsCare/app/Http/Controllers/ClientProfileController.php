<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientProfileRequest;
use App\Http\Requests\UpdateClientProfileRequest;
use App\Repositories\ClientProfileRepository;
use App\Repositories\usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ClientProfileController extends AppBaseController
{
    /** @var ClientProfileRepository $clientProfileRepository*/
    private $clientProfileRepository;
    private $usersRepository;


    public function __construct(ClientProfileRepository $clientProfileRepo,usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->clientProfileRepository = $clientProfileRepo;
    }

    /**
     * Display a listing of the ClientProfile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientProfiles = $this->clientProfileRepository->all();

        return view('client_profiles.index')
            ->with('clientProfiles', $clientProfiles);
    }

    /**
     * Show the form for creating a new ClientProfile.
     *
     * @return Response
     */
    public function create()
    {
        {
            $clients = $this->usersRepository->all()
            ->where('type','=','Client')->pluck('user_name', 'id');
            return view('client_profiles.create')->with('clients', $clients);
        }
    }

    /**
     * Store a newly created ClientProfile in storage.
     *
     * @param CreateClientProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateClientProfileRequest $request)
    {
        $input = $request->all();

        $clientProfile = $this->clientProfileRepository->create($input);

        Flash::success('Client Profile saved successfully.');

        return redirect(route('clientProfiles.index'));
    }

    /**
     * Display the specified ClientProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientProfile = $this->clientProfileRepository->find($id);

        if (empty($clientProfile)) {
            Flash::error('Client Profile not found');

            return redirect(route('clientProfiles.index'));
        }

        return view('client_profiles.show')->with('clientProfile', $clientProfile);
    }

    /**
     * Show the form for editing the specified ClientProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientProfile = $this->clientProfileRepository->find($id);

        if (empty($clientProfile)) {
            Flash::error('Client Profile not found');

            return redirect(route('clientProfiles.index'));
        }

        return view('client_profiles.edit')->with('clientProfile', $clientProfile);
    }

    /**
     * Update the specified ClientProfile in storage.
     *
     * @param int $id
     * @param UpdateClientProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientProfileRequest $request)
    {
        $clientProfile = $this->clientProfileRepository->find($id);

        if (empty($clientProfile)) {
            Flash::error('Client Profile not found');

            return redirect(route('clientProfiles.index'));
        }

        $clientProfile = $this->clientProfileRepository->update($request->all(), $id);

        Flash::success('Client Profile updated successfully.');

        return redirect(route('clientProfiles.index'));
    }

    /**
     * Remove the specified ClientProfile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientProfile = $this->clientProfileRepository->find($id);

        if (empty($clientProfile)) {
            Flash::error('Client Profile not found');

            return redirect(route('clientProfiles.index'));
        }

        $this->clientProfileRepository->delete($id);

        Flash::success('Client Profile deleted successfully.');

        return redirect(route('clientProfiles.index'));
    }
}
