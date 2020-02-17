import {put, takeLatest} from "@redux-saga/core/effects";
import {createAssignSelfPrefs} from "../utils/AppInitutils";

let getDefaultPerson = function (persons) {
    console.log("PERSONS in getDefaultPerson(): ", persons)
    let defautlPerson = {};
    for (let i = 0; i < persons.length; i++) {
        if (persons[i].self === true) {
            defautlPerson = persons[i];
            break;
        }
    }
    return defautlPerson;
}

let defaultAssigment = function (prefs, people) {
    let defaultAss = [];
    if (typeof prefs != "undefined" && prefs.alwaysRenderSelf === true) {
        defaultAss = [{
            "assignedPerson": getDefaultPerson(people),
            "assignedPersons": getDefaultPerson(people),
            "assignedRole": prefs.defaultRole,
            "assignmentKey": 0
        }]
    }
    console.log("defaultAss in AJAX_INIT_DONE in saga", defaultAss);
    return defaultAss;
}


function* workFetchInitAjaxData(action) {
    console.log("action at TOP OF ASSIGN SAGA: ", action);

    /** in LRAVEL this one needs to be initialized with a proper yield fetch */
    action.ass = [];
    action.count = 0;
    action.nextKey = 0;
    action.assigned = 0;

    const rawPrefs = yield fetch('/getPreferencesAjax',
        {
            headers: {
                'Content-Type': 'application/json', 'Accept': 'application/json'
            }
        }).then(response => response.json());

    console.log( "rawPrefs: ", rawPrefs );

    const jsonPreferences = createAssignSelfPrefs( rawPrefs );

    action.count = 0;
    action.nextKey = 0;
    action.assigned = 0;
    action.preferences = jsonPreferences;

    if (jsonPreferences.alwaysRenderSelf == true) {
        const peopleJson = yield fetch('/crewmembersAjax', {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
            .then(response => response.json());

        action.ass = defaultAssigment(jsonPreferences, peopleJson);
        action.count = 1;
        action.nextKey = 1;
        action.assigned = 1;
    }

    let bigJ = action;

    yield put({type: "AJAX_INIT_DONE", bigJ});
}

export function* triggerInitAjaxDataActionWatcher() {
    yield takeLatest("START_AJAX_INIT", workFetchInitAjaxData);
}
