import React, { Component } from 'react';

const Crewmember = ({ crewmember }) => {

    const divStyle = {
        /* some css code i guess? */
    }

    if (!crewmember) {
        return (<div style={divStyle}> Crewmember does not exist </div>);
    }

    return (
        <div style={divStyle}>
            <h2>{crewmember.first_name}</h2>
        </div>
    );

}
export default Crewmember;
