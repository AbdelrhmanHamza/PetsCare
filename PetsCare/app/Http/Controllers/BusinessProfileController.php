<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBusinessProfileRequest;
use App\Http\Requests\UpdateBusinessProfileRequest;
use App\Repositories\BusinessProfileRepository;
use App\Repositories\usersRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\users;
use Illuminate\Http\Request;
use Flash;
use Response;

class BusinessProfileController extends AppBaseController
{
    /** @var BusinessProfileRepository $businessProfileRepository*/
    private $businessProfileRepository;
    private $usersRepository;
    public function __construct(BusinessProfileRepository $businessProfileRepo,usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->businessProfileRepository = $businessProfileRepo;
    }

    /**
     * Display a listing of the BusinessProfile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $businessProfiles = $this->businessProfileRepository->all();

        return view('business_profiles.index')
            ->with('businessProfiles', $businessProfiles);
    }

    /**
     * Show the form for creating a new BusinessProfile.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->usersRepository->all()
        ->where('type','=','Business')->pluck('user_name', 'id');
        return view('business_profiles.create')->with('users', $users);
    }

    /**
     * Store a newly created BusinessProfile in storage.
     *
     * @param CreateBusinessProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessProfileRequest $request)
    {
        $input = $request->all();

        $businessProfile = $this->businessProfileRepository->create($input);

        Flash::success('Business Profile saved successfully.');

        return redirect(route('businessProfiles.index'));
    }

    /**
     * Display the specified BusinessProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessProfile = $this->businessProfileRepository->find($id);

        if (empty($businessProfile)) {
            Flash::error('Business Profile not found');

            return redirect(route('businessProfiles.index'));
        }

        return view('business_profiles.show')->with('businessProfile', $businessProfile);
    }

    /**
     * Show the form for editing the specified BusinessProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessProfile = $this->businessProfileRepository->find($id);

        if (empty($businessProfile)) {
            Flash::error('Business Profile not found');

            return redirect(route('businessProfiles.index'));
        }

        return view('business_profiles.edit')->with('businessProfile', $businessProfile);
    }

    /**
     * Update the specified BusinessProfile in storage.
     *
     * @param int $id
     * @param UpdateBusinessProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessProfileRequest $request)
    {
        $businessProfile = $this->businessProfileRepository->find($id);

        if (empty($businessProfile)) {
            Flash::error('Business Profile not found');

            return redirect(route('businessProfiles.index'));
        }

        $businessProfile = $this->businessProfileRepository->update($request->all(), $id);

        Flash::success('Business Profile updated successfully.');

        return redirect(route('businessProfiles.index'));
    }

    /**
     * Remove the specified BusinessProfile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessProfile = $this->businessProfileRepository->find($id);

        if (empty($businessProfile)) {
            Flash::error('Business Profile not found');

            return redirect(route('businessProfiles.index'));
        }

        $this->businessProfileRepository->delete($id);

        Flash::success('Business Profile deleted successfully.');

        return redirect(route('businessProfiles.index'));
    }
}
