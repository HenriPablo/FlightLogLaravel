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
use Flash;
use Illuminate\Http\Request;
use Response;
use Prettus\Repository\Criteria\RequestCriteria;



class AircraftClassController extends Controller
{
    private $aircraftClassRepository;

    public function __construct( AircraftClassRepository $aircraftClassRepository)
    {
        $this->aircraftClassRepository = $aircraftClassRepository;
    }

    public function index( Request $request ){}

}
