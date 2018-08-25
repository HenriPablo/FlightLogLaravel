<?php
/**
 * Created by IntelliJ IDEA.
 * User: tbrymora
 * Date: 8/23/2018
 * Time: 11:03 AM
 */
namespace App\Http\Controllers;

use App\Http\Requests\CreateAircraftClassRequest;
use App\Http\Requests\UpdateAircraftClassRequest;
use App\Repositories\AircraftClassRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;



class AircraftClassController extends Controller
{
    /** @var AircraftClassRepository  */
    private $aircraftClassRepository;

    public function __construct( AircraftClassRepository $aircraftClassRepository)
    {
        $this->aircraftClassRepository = $aircraftClassRepository;
    }

    public function index( Request $request )
    {
        $this->aircraftClassRepository->pushCriteria( new RequestCriteria( $request));
        $aircraftClass = $this->aircraftClassRepository->all();
        return view( 'aircraft_class.index')
            ->with('aircraftClass', $aircraftClass);
    }

    public function create()
    {
        return view( 'aircraft_class.create');
    }

    public function store(CreateAircraftClassRequest $request)
    {

        $input = $request->all();

        $aircraft_class = $this->aircraftClassRepository->create($input);

        Flash::success('Aircraft Class saved successfully.');

        return redirect(route('aircraft_class.index'));

    }
    public function show( $id )
    {
        $aircraft_class = $this->aircraftClassRepository->findWithoutFail($id);

        if (empty($aircraft_class)) {
            Flash::error('Aircraft Class not found');

            return redirect(route('aircraft_class.index'));
        }

        return view('aircraft_class.show')->with('aircraft_class', $aircraft_class);
    }
    public function edit( $id )
    {
        $aircraft_class = $this->aircraftClassRepository->findWithoutFail($id);

        if (empty($aircraft_class)) {
            Flash::error('Aircraft Class not found');

            return redirect(route('aircraft_class.index'));
        }

        return view('aircraft_class.edit')->with('aircraft_class', $aircraft_class);
    }
    public function update( $id, UpdateAircraftClassRequest $request )
    {
        $aircraft_class = $this->aircraftClassRepository->findWithoutFail($id);

        if (empty($aircraft_class)) {
            Flash::error('Aircraft Class not found');

            return redirect(route('aircraft_class.index'));
        }

        $aircraft_class = $this->aircraftClassRepository->update($request->all(), $id);

        Flash::success('Aircraft Class updated successfully.');

        return redirect(route('aircraft_class.index'));
    }
    public function destroy( $id )
    {
        $aircraft_class = $this->aircraftClassRepository->findWithoutFail($id);

        if (empty($aircraft_class)) {
            Flash::error('Aircraft Class not found');

            return redirect(route('aircraft_class.index'));
        }

        $this->aircraftClassRepository->delete($id);

        Flash::success('Aircraft Class deleted successfully.');

        return redirect(route('aircraft_class.index'));
    }

}
