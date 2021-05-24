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
use App\Repositories\aircraftRepository;
use App\Repositories\FlightRepository;
use Illuminate\Http\Request;
use App\Models\aircraft;
use App\Models\Airport;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use function Psy\debug;


class FlightController extends Controller
{
    /** @var FlightRepository  */
    private $flightRepository;
    private $aircraftRepository;

    public function __construct( FlightRepository $flightRepository, aircraftRepository $aircraftRepo)
    {
        $this->flightRepository = $flightRepository;
        $this->aircraftRepository = $aircraftRepo;
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
        $aircraft = aircraft::pluck('aircraft_tail_number', 'id', 'nickname')->toArray();
        $airport = Airport::pluck('id', 'ico_identifier', 'name')->toArray();
        return view('flight.create')
            ->with('aircraft', $aircraft)
            ->with('airport', $airport);
    }

    public function store(CreateFlightRequest $request)
    {
        $input = $request->all();
        $flight = $this->flightRepository->create($input);
        $this->saveFlightCrewAssignment( $request, $flight->id );
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
        $aircraft = aircraft::pluck('aircraft_tail_number', 'id', 'nickname')->toArray();
        return view('flight.show')
            ->with('flight', $flight)
            ->with('aircraft', $aircraft);
    }

    public function edit($id)
    {
        $flight = $this->flightRepository->findWithoutFail($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flight.index'));
        }
        $aircraft = aircraft::pluck('aircraft_tail_number', 'id', 'nickname')->toArray();
        $airport = Airport::pluck('id', 'ico_identifier', 'name')->toArray();
        return view('flight.edit')
            ->with('flight', $flight)
            ->with('aircraft', $aircraft)
            ->with('airport', $airport);
    }

    public function update($id, UpdateFlightRequest $request)
    {
        $flight1 = $this->flightRepository->findWithoutFail($id);
        if (empty($flight1)) {
            Flash::error('Flight not found');

            return redirect(route('flight.index'));
        }

        $this->saveFlightCrewAssignment($request, $id);

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

    public function flightCrewMemberAssignmentsByAjax( $id ){

        $flightCrewMemberAssignments = DB::select( 'select * from crew_assignment where flight_id = ?', [$id]);
        return json_encode( $flightCrewMemberAssignments );
    }

    /**
     * @param $request
     * @param $id flight ID
     */
    private function saveFlightCrewAssignment( $request, $id ){

//        dump( $id);

        $cnt = -1;
        $tmp_role = "";
        $tmp_crw = "";

        DB::delete( 'delete from crew_assignment where flight_id = ?;', [$id] );

        foreach( $request as $r ){
            foreach( $r as $key => $value){

                if( (strpos( $key, 'person-select') !== false) || (strpos( $key, 'role-select') !== false)  ){

                    /* set the assignment counter */
                    $cnt = preg_split('/-/', $key);

//                    dump( end($cnt ));
//                    dump($key . " -> ID: " . $value);

                    if( strpos( $key, 'person-select') !== false ){
                        $tmp_crw = $value;
                    }
                    if( (strpos( $key, 'role-select') !== false) ){
                        $tmp_role = $value;
                    }

                    if( $tmp_role !== "" && $tmp_crw !== "" && $cnt !== -1 ){
                        DB::insert( 'insert into crew_assignment(flight_id, crewmembertype_id, crewmember_id ) values ( ?, ?, ? )', [$id, $tmp_role, $tmp_crw ]);
                        $tmp_crw = "";
                        $tmp_role = "";
                        $cnt = -1;
                    }
                }
            }
        }
    }
}
