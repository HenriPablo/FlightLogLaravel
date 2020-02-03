import {put, takeLatest} from "@redux-saga/core/effects";
export {actionWatcher}

/** LOAD ROLES */
function* fetchRoles() {
//    const json = yield fetch('http://localhost:3000/ajax-test.json' , {headers : {'Content-Type': 'application/json','Accept': 'application/json'}})

    const json = yield fetch(
        '/crewmemberTypesAjax' ,
        {
            headers : {
            'Content-Type': 'application/json','Accept': 'application/json'
            }
        })
        .then( response => response.json());

    // const jsonPreferences = yield fetch('/getPreferencesAjax',
    //     {
    //         headers: {
    //             'Content-Type':'application/json', 'Accept':'application/json'
    //         }
    //     }).then( response => response.json());

    yield put({ type: 'ROLES_RECEIVED', json: json });
    //yield put({ type: 'PREFERENCES_RECEIVED', jsonPreferences: jsonPreferences})
}

function* actionWatcher(){
    yield  takeLatest("GET_ROLES",   fetchRoles );
}



