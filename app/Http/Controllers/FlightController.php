<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:33 PM
 */
namespace App\Http\Controllers;

use App\Http\Requests\CreateFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use App\Repositories\FlightRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class FlightController extends Controller
{

    /** @var FlightRepository  */
    private $flightRepository;

    public function __construct( FlightRepository $flightRepository)
    {
        $this->flightRepository = $flightRepository;
    }

    public function index( Request $request)
    {
        $this->flightRepository->pushCriteria( new RequestCriteria($request));
        $flights = $this->flightRepository->all();
        return view( 'flight.index')
            ->with('flights', $flights);
    }

    public function create()
    {
        return view('flight.create');
    }

    public function store(CreateFlightRequest $request)
    {

        $input = $request->all();

        $flight = $this->flightRepository->create($input);

        Flash::success('Flight saved successfully.');

        return redirect(route('flight.index'));

    }

    public function show($id)
    {
        $flight = $this->flightRepository->findWithoutFail($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flight.index'));
        }

        return view('flight.show')->with('flight', $flight);
    }

    public function edit($id)
    {
        $flight = $this->flightRepository->findWithoutFail($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flight.index'));
        }

        return view('flight.edit')->with('flight', $flight);
    }

    public function update($id, UpdateFlightRequest $request)
    {
        $flight = $this->flightRepository->findWithoutFail($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flight.index'));
        }

        $flight = $this->flightRepository->update($request->all(), $id);

        Flash::success('Flight updated successfully.');

        return redirect(route('flight.index'));
    }

    public function destroy($id)
    {
        $flight = $this->flightRepository->findWithoutFail($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flight.index'));
        }

        $this->flightRepository->delete($id);

        Flash::success('Flight deleted successfully.');

        return redirect(route('flight.index'));
    }

}
