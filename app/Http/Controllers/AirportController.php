<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:33 PM
 */
namespace App\Http\Controllers;

use App\Http\Requests\CreateAirportRequest;
use App\Http\Requests\UpdateAirportRequest;
use App\Repositories\AirportRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class AirportController extends Controller
{

    /** @var AirportRepository  */
    private $airportRepository;

    public function __construct( AirportRepository $airportRepository)
    {
        $this->airportRepository = $airportRepository;
    }

    public function index( Request $request)
    {
        $this->airportRepository->pushCriteria( new RequestCriteria($request));
        $airports = $this->airportRepository->all();
        return view( 'airport.index')
            ->with('airports', $airports);
    }

    public function create()
    {
        return view('airport.create');
    }

    public function store(CreateAirportRequest $request)
    {

        $input = $request->all();

        $airport = $this->airportRepository->create($input);

        Flash::success('Airport saved successfully.');

        return redirect(route('airport.index'));

    }

    public function show($id)
    {
        $airport = $this->airportRepository->findWithoutFail($id);

        if (empty($airport)) {
            Flash::error('Airport not found');

            return redirect(route('airport.index'));
        }

        return view('airport.show')->with('airport', $airport);
    }

    public function edit($id)
    {
        $airport = $this->airportRepository->findWithoutFail($id);

        if (empty($airport)) {
            Flash::error('Airport not found');

            return redirect(route('airport.index'));
        }

        return view('airport.edit')->with('airport', $airport);
    }

    public function update($id, UpdateAirportRequest $request)
    {
        $airport = $this->airportRepository->findWithoutFail($id);

        if (empty($airport)) {
            Flash::error('Airport not found');

            return redirect(route('airport.index'));
        }

        $airport = $this->airportRepository->update($request->all(), $id);

        Flash::success('Airport updated successfully.');

        return redirect(route('airport.index'));
    }

    public function destroy($id)
    {
        $airport = $this->airportRepository->findWithoutFail($id);

        if (empty($airport)) {
            Flash::error('Airport not found');

            return redirect(route('airport.index'));
        }

        $this->airportRepository->delete($id);

        Flash::success('Airport deleted successfully.');

        return redirect(route('airport.index'));
    }

}
