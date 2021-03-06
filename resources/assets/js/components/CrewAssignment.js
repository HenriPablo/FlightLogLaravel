import React, { Component } from "react";
import ReactDOM from "react-dom";
import Crewmember from './Crewmember';


//import "./styles.css";

class CrewAssignment extends Component {
    constructor() {
        super();

        this.state = {
            /** TODO: replace with proper ajax call, get only names and ID!!!!
            crewmembers: [{ "id": 74, "first_name": "Tomasz", "last_name": "Brymora" }, {
                "id": 89,
                "first_name": "Cecily",
                "last_name": "Lyons"
            }, { "id": 90, "first_name": "Rob", "last_name": "Gilchrist" }, {
                "id": 91,
                "first_name": "Misa",
                "last_name": "Miguchi"
            }],*/
            crewmembers:[],
            currentCrewmember: null
        }
    }

    componentDidMount() {
        fetch('/crewmembersAjax').then(
            response => {
                return response.json();
            }
        ).then( crewmembers => {
            console.log("crewmembersAjax: ", crewmembers)
            this.setState({crewmembers});
        });

        fetch('/crewmemberTypesAjax').then(
            response => {
                return response.json();
            }
        ).then( crewmemberTypes => {
            console.log( "crewmemberTypes: ", crewmemberTypes );
        })
    }

    renderCrewmembers() {
        return this.state.crewmembers.map(crewmember => {
            return (
                <li onClick={ () => this.handleClick(crewmember)} key={crewmember.id} >
                    {crewmember.id} {crewmember.first_name} {crewmember.last_name}
                </li>

            );
        })
    }

    handleClick(crewmember) {
        this.setState({ currentCrewmember: crewmember });
    }

    handleButtonClick(){

        alert('hi');

    }



    render() {
        return (
            <div className="crew-assigmnet">
                <h2>Crew Assignment</h2>
                <ul>
                    {this.renderCrewmembers()}
                </ul>
                <button type="button" onClick={ ()=> this.handleButtonClick() }>Add Crew Member</button>

                <Crewmember crewmember={this.state.currentCrewmember} />

            </div>
        );
    }
}

const rootElement = document.getElementById("crew-assignment-wrapper");
ReactDOM.render(<CrewAssignment />, rootElement);
