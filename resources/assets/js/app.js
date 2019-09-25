
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

//require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//require('./components/Example');

/** figure out how to load this 'as needed' style */
//require('./components/CrewAssignment')

import "core-js/stable";                /* for babel polyfill - IE11 */
import "regenerator-runtime/runtime";   /* for babel polyfill - IE11 */
import React from "react";
import ReactDOM from "react-dom";
import { createStore } from "redux";
import { Provider } from "react-redux";

import { AssignButton } from "./AssignButton";
import AssignmentsContainer from "./AssignmentsContainer";
import reducer from "./reducers";
import "./index.css";

const store = createStore(reducer);
const rootElement = document.getElementById("crew-assignment-wrapper");

/**
 * some guides:
 *  REDUX:
 *    https://spectrum.chat/frontend/opinion/named-exports-vs-default-exports-or-both~32c58d5b-9ba0-46b5-b00d-783f2799ddb4
 https://github.com/Apress/pro-react-16/blob/master/20%20-%20Using%20the%20Data%20Store%20APIs/productapp/src/ProductDisplay.js

 redux-saga:

 https://medium.com/@lavitr01051977/make-your-first-call-to-api-using-redux-saga-15aa995df5b6
 https://github.com/Lavitr/React-Redux-SAGA-tutorial-APP?source=post_page-----15aa995df5b6----------------------

 */

ReactDOM.render(
<Provider store={store}>
    <AssignButton />
    <AssignmentsContainer />
    </Provider>,
rootElement
);
