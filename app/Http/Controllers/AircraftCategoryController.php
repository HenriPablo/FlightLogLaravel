<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:33 PM
 */
namespace App\Http\Controllers;

use App\Http\Requests\CreateAircraftCategoryRequest;
use App\Http\Requests\UpdateAircraftCategoryRequest;
use App\Repositories\AircraftCategoryRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class AircraftCategoryController extends Controller
{

    /** @var AircraftCategoryRespository  */
    private $aircractCategoryRespository;

    public function __construct( AircraftCategoryRepository $aircraftCategoryRepo)
    {
        $this->aircractCategoryRespository = $aircraftCategoryRepo;
    }

    public function index( Request $request)
    {
        $this->aircractCategoryRespository->pushCriteria( new RequestCriteria($request));
        $aircraftCategories = $this->aircractCategoryRespository->all();
        return view( 'aircraft_categories.index')
            ->with('aircraftCategories', $aircraftCategories);
    }

    public function create()
    {
        return view('aircraft_categories.create');
    }

    public function store(CreateAircraftCategoryRequest $request)
    {

        $input = $request->all();

        $aircraft_category = $this->aircractCategoryRespository->create($input);

        Flash::success('Aircraft Category saved successfully.');

        return redirect(route('aircraft_category.index'));

    }

    public function show($id)
    {
        $aircraft_category = $this->aircractCategoryRespository->findWithoutFail($id);

        if (empty($aircraft_category)) {
            Flash::error('Aircraft Category not found');

            return redirect(route('aircraft_categories.index'));
        }

        return view('aircraft_categories.show')->with('aircraft_category', $aircraft_category);
    }

    public function edit($id)
    {
        $aircraft_category = $this->aircractCategoryRespository->findWithoutFail($id);

        if (empty($aircraft_category)) {
            Flash::error('Aircraft Category not found');

            return redirect(route('aircraft_categories.index'));
        }

        return view('aircraft_categories.edit')->with('aircraft_category', $aircraft_category);
    }

    public function update($id, UpdateAircraftCategoryRequest $request)
    {
        $aircraft_category = $this->aircractCategoryRespository->findWithoutFail($id);

        if (empty($aircraft_category)) {
            Flash::error('Aircraft Category not found');

            return redirect(route('aircraft_category.index'));
        }

        $aircraft_category = $this->aircractCategoryRespository->update($request->all(), $id);

        Flash::success('Aircraft Category updated successfully.');

        return redirect(route('aircraft_category.index'));
    }

    public function destroy($id)
    {
        $aircraft_category = $this->aircractCategoryRespository->findWithoutFail($id);

        if (empty($aircraft_category)) {
            Flash::error('Aircraft Category not found');

            return redirect(route('aircraft_category.index'));
        }

        $this->aircractCategoryRespository->delete($id);

        Flash::success('Aircraft Category deleted successfully.');

        return redirect(route('aircraft_category.index'));
    }

}
