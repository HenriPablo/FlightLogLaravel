import React from "react";
import ReactDOM from "react-dom";

import "./styles.css";

function CrewAssignment() {
    return (
        <div className="crew-assigmnet">
            <h2>Crew Assignment</h2>
            <button
                bsStyle="primary"
                bsSize="large"
                //onClick={alert('hello button')}
            >
                Add Crew Member
            </button>
        </div>
    );
}

const rootElement = document.getElementById("crew-assignment-wrapper");
ReactDOM.render(<CrewAssignment />, rootElement);
