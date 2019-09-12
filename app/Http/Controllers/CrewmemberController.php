<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:33 PM
 */
namespace App\Http\Controllers;

use App\Http\Requests\CreateCrewmemberRequest;
use App\Http\Requests\UpdateCrewmemberRequest;
use App\Models\Crewmember;
use App\Models\CrewmemberType;
use App\Repositories\CrewmemberRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;


class CrewmemberController extends Controller
{

    /** @var CrewmemberRepository  */
    private $crewmemberRepository;

    public function __construct( CrewmemberRepository $crewmemberRepository)
    {
        $this->crewmemberRepository = $crewmemberRepository;
    }

    public function index( Request $request)
    {
        $this->crewmemberRepository->pushCriteria( new RequestCriteria($request));
        $cremember = $this->crewmemberRepository->all();
        return view( 'crewmember.index')
            ->with('crewmember', $cremember);
    }

    public function create()
    {
        return view('crewmember.create');
    }

    public function store(CreateCrewmemberRequest $request)
    {

        $input = $request->all();

        $crewmember = $this->crewmemberRepository->create($input);

        Flash::success('Crewmember saved successfully.');

        return redirect(route('crewmember.index'));

    }

    public function show($id)
    {
        $crewmember = $this->crewmemberRepository->findWithoutFail($id);

        if (empty($crewmember)) {
            Flash::error('Crewmember not found');

            return redirect(route('crewmember.index'));
        }

        return view('crewmember.show')->with('crewmember', $crewmember);
    }

    public function edit($id)
    {
        $crewmember = $this->crewmemberRepository->findWithoutFail($id);

        if (empty($crewmember)) {
            Flash::error('Crewmember not found');

            return redirect(route('crewmember.index'));
        }

        $crewmemberType = CrewmemberType::pluck('role', 'id')->toArray();
        return view('crewmember.edit')
            ->with('crewmember', $crewmember)
            ->with('crewmemberType', $crewmemberType);
    }

    public function update($id, UpdateCrewmemberRequest $request)
    {
        $crewmember = $this->crewmemberRepository->findWithoutFail($id);

        if (empty($crewmember)) {
            Flash::error('Crewmember not found');

            return redirect(route('crewmember.index'));
        }

        $crewmember = $this->crewmemberRepository->update($request->all(), $id);

        Flash::success('Crewmember updated successfully.');

        return redirect(route('crewmember.index'));
    }

    public function destroy($id)
    {
        $crewmember = $this->crewmemberRepository->findWithoutFail($id);

        if (empty($crewmember)) {
            Flash::error('Crewmember not found');

            return redirect(route('crewmember.index'));
        }

        $this->crewmemberRepository->delete($id);

        Flash::success('Crewmember deleted successfully.');

        return redirect(route('crewmember.index'));
    }

    public function crewmembersAjax(Request $request){

        //Request $request

        $this->crewmemberRepository->pushCriteria( new RequestCriteria($request));
        /**
         * select role IS as array:
         *select first_name, ARRAY( select crewmembertype_id from crewmember_crewmembertype_xref where crewmember_crewmembertype_xref.crewmember_id = crewmember.id) as "role_ids" from crewmember
         Call raw SQL: https://stackoverflow.com/questions/33049511/how-to-execute-raw-queries-with-laravel-5-1
         Call Stored procedure: https://stackoverflow.com/questions/34497063/how-to-execute-stored-procedure-from-laravel
         * DB::select('exec my_stored_procedure("Param1", "param2",..)');
         */
        $crewmembers = DB::select("select select_crew_members_with_roles()"); //DB::table('crewmember')->select('id','first_name', 'last_name')->get();
            //Crewmember::pluck('id', 'first_name', 'last_name');//->toArray();
            //$this->crewmemberRepository->all();
        var_dump( $crewmembers );
        return $crewmembers->toJson();
    }

}
