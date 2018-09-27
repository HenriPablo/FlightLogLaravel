import React, { Component } from 'react';

const Crewmember = ({ crewmember }) => {

    const divStyle = {
        /* some css code i guess? */
        'background':'#efefef',
        'padding':'0.5%',
        'border-radius':'4px'
    }

    if (!crewmember) {
        return (<div style={divStyle}> Select a crewmember</div>);
    }

    return (
        <div style={divStyle}>
            <p>{crewmember.id} {crewmember.first_name} {crewmember.last_name}</p>
        </div>
    );

}
export default Crewmember;
