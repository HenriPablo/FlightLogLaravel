<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:33 PM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAircraftCategoryRequest;
use App\Repositories\AircraftCategoryRepository;

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



    public function destroy($id)
    {}

}
