<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:33 PM
 */
namespace App\Http\Controllers;

use App\Http\Requests\CreateCrewmemberTypeRequest;
use App\Http\Requests\UpdateCrewmemberTypeRequest;
use App\Models\CrewmemberType;
use App\Repositories\CrewmemberTypeRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;


class CrewmemberTypeController extends Controller
{

    /** @var CrewmemberTypeRepository  */
    private $crewmemberTypeRepository;

    public function __construct( CrewmemberTypeRepository $crewmemberTypeRepository)
    {
        $this->crewmemberTypeRepository = $crewmemberTypeRepository;
    }

    public function index( Request $request)
    {
        $this->crewmemberTypeRepository->pushCriteria( new RequestCriteria($request));
        $crememberTypes = $this->crewmemberTypeRepository->all();
        return view( 'crewmember_type.index')
            ->with('crewmemberTypes', $crememberTypes);
    }

    public function create()
    {
        return view('crewmember_type.create');
    }

    public function store(CreateCrewmemberTypeRequest $request)
    {

        $input = $request->all();

        $crewmemberType = $this->crewmemberTypeRepository->create($input);

        Flash::success('Crewmember Type saved successfully.');

        return redirect(route('crewmember_type.index'));

    }

    public function show($id)
    {
        $crewmemberType = $this->crewmemberTypeRepository->findWithoutFail($id);

        if (empty($crewmemberType)) {
            Flash::error('Crewmember Type not found');

            return redirect(route('crewmember_type.index'));
        }

        return view('crewmember_type.show')->with('crewmemberType', $crewmemberType);
    }

    public function edit($id)
    {
        $crewmemberType = $this->crewmemberTypeRepository->findWithoutFail($id);

        if (empty($crewmemberType)) {
            Flash::error('Crewmember Type not found');

            return redirect(route('crewmember_type.index'));
        }

        return view('crewmember_type.edit')->with('crewmemberType', $crewmemberType);
    }

    public function update($id, UpdateCrewmemberTypeRequest $request)
    {
        $crewmemberType = $this->crewmemberTypeRepository->findWithoutFail($id);

        if (empty($crewmemberType)) {
            Flash::error('Crewmember Type not found');

            return redirect(route('crewmember_type.index'));
        }

        $crewmemberType = $this->crewmemberTypeRepository->update($request->all(), $id);

        Flash::success('Crewmember Type updated successfully.');

        return redirect(route('crewmember_type.index'));
    }

    public function destroy($id)
    {
        $crewmemberType = $this->crewmemberTypeRepository->findWithoutFail($id);

        if (empty($crewmemberType)) {
            Flash::error('Crewmember Type not found');

            return redirect(route('crewmember_type.index'));
        }

        $this->crewmemberTypeRepository->delete($id);

        Flash::success('Crewmember Type deleted successfully.');

        return redirect(route('crewmember_type.index'));
    }

    public function crewmemberTypesAjax(){
        $crewmemberTypes  = DB::select('select ct.id, ct.role from crewmembertype as ct');
        return  json_encode( $crewmemberTypes );
    }

    public function crewmemberTypeByIdAjax($id){
        /**  DB::connection()->enableQueryLog(); */
        $crewmemberTypes  = DB::select(
            'select ct.id, ct.role 
                   from crewmembertype as ct
                   left join crewmember_crewmembertype_xref as cct 
                   on ct.id = cct.crewmembertype_id
                   where  cct.crewmember_id = ?', [$id]
                );
        /** $queries = DB::getQueryLog();
        dump($queries); */
        return  json_encode( $crewmemberTypes );
    }
}
