<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaircraftRequest;
use App\Http\Requests\UpdateaircraftRequest;
use App\Models\AircraftCategory;
use App\Repositories\aircraftRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

//use App\Http\Controllers\Controller;

class aircraftController extends Controller
{
    /** @var  aircraftRepository */
    private $aircraftRepository;

    public function __construct(aircraftRepository $aircraftRepo)
    {
        $this->aircraftRepository = $aircraftRepo;
    }

    /**
     * Display a listing of the aircraft.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->aircraftRepository->pushCriteria(new RequestCriteria($request));
        $aircrafts = $this->aircraftRepository->all();

        return view('aircrafts.index')
            ->with('aircrafts', $aircrafts);
    }

    /**
     * Show the form for creating a new aircraft.
     *
     * @return Response
     */
    public function create()
    {
        return view('aircrafts.create');
    }

    /**
     * Store a newly created aircraft in storage.
     *
     * @param CreateaircraftRequest $request
     *
     * @return Response
     */
    public function store(CreateaircraftRequest $request)
    {
        $input = $request->all();

        $aircraft = $this->aircraftRepository->create($input);

        Flash::success('Aircraft saved successfully.');

        return redirect(route('aircrafts.index'));
    }

    /**
     * Display the specified aircraft.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aircraft = $this->aircraftRepository->findWithoutFail($id);

        if (empty($aircraft)) {
            Flash::error('Aircraft not found');

            return redirect(route('aircrafts.index'));
        }

        return view('aircrafts.show')->with('aircraft', $aircraft);
    }

    /**
     * Show the form for editing the specified aircraft.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aircraft = $this->aircraftRepository->findWithoutFail($id);

        if (empty($aircraft)) {
            Flash::error('Aircraft not found');

            return redirect(route('aircrafts.index'));
        }

        $c = AircraftCategory::pluck('category', 'id')->toArray();
        $aircraftClasses = AircraftClass::pluck('class','id')->toArray();

        return view('aircrafts.edit')
            ->with('aircraft', $aircraft)
            ->with('categories', $c )
            ->with('classes', $aircraftClasses);
    }

    /**
     * Update the specified aircraft in storage.
     *
     * @param  int              $id
     * @param UpdateaircraftRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaircraftRequest $request)
    {
        $aircraft = $this->aircraftRepository->findWithoutFail($id);

        if (empty($aircraft)) {
            Flash::error('Aircraft not found');

            return redirect(route('aircrafts.index'));
        }

        $aircraft = $this->aircraftRepository->update($request->all(), $id);

        Flash::success('Aircraft updated successfully.');

        return redirect(route('aircrafts.index'));
    }

    /**
     * Remove the specified aircraft from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aircraft = $this->aircraftRepository->findWithoutFail($id);

        if (empty($aircraft)) {
            Flash::error('Aircraft not found');

            return redirect(route('aircrafts.index'));
        }

        $this->aircraftRepository->delete($id);

        Flash::success('Aircraft deleted successfully.');

        return redirect(route('aircrafts.index'));
    }
}
