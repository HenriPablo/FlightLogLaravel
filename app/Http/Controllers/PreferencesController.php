<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePreferencesRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PreferencesRepository;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class PreferencesController extends Controller
{
    /** @var PreferencesRepository */
    private $preferencesRepository;

    public function __construct( PreferencesRepository $preferencesRepository)
    {
        $this->preferencesRepository = $preferencesRepository;
    }

    public function index( Request $request){
        $this->preferencesRepository->pushCriteria( new RequestCriteria( $request ));
        $preferences = $this->preferencesRepository->all();
        return view ( 'preferences.index')
            ->with('preferences', $preferences);
    }

    public function show( $id ){
        $preferences = $this->preferencesRepository->findWithoutFail($id);
        if( empty($preferences)){
            Flash::error('Preferences not found');
            return redirect( route('preferences.index'));
        }
        return view('preferences.show')
            ->with('preferences', $preferences);
    }

    public function edit( $id ){
        $preferences = $this->preferencesRepository->findWithoutFail( $id );
        if(empty($preferences)){
            Flash::error('Preferences not found');
            return redirect( route('preferences.index'));
        }
        return view('preferences.edit')->with('preferences', $preferences);
    }

    public function update( $id, UpdatePreferencesRequest $request){
        $preferences = $this->preferencesRepository->findWithoutFail($id);
        if(empty($preferences)){
            Flash::error('Could not update Preferences - Preferences not found');
            return redirect( route('preferences.index'));
        }
        $preferences = $this->preferencesRepository->update($request->all(), $id);

        //var_dump( $preferences);
        //abort(true);

        Flash::success('Preferences updated successfully.');
        return redirect(route('preferences.index'));//->with('preferences', $preferences);
    }


    public function getPreferencesAjax( Request $request){
        $this->preferencesRepository->pushCriteria( new RequestCriteria( $request));
        //$preferences = $this->preferencesRepository->all();

        $preferences = DB::select(
            'select * from preferences where preferences_group_id = (select id from preferences_group where preferences_group_code =?)', ['flight']
        );
        return  $preferences;// "hello world";
    }

}
