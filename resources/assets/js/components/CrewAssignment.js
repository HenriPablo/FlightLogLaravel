import React, { Component } from "react";
import ReactDOM from "react-dom";

//import "./styles.css";

class CrewAssignment extends Component {
    constructor() {
        super();

        this.state = {
            crewmembers: []
        }
    }

    componentDidMount(){

    }

    renderCrewmembers(){
        return this.state.crewmembers.map( crewmember =>{
            return(
                <li onClick={
                    ()=>this.handleClic( crewmember)} key={crewmember.id} > {crewmember.id}
                </li>

            );
        })
    }


    /** TODO: replace with proper ajax call, get only names and ID!!!! */
    let crewMembers = [{"id":74,"address1":"5979 45 Ave. North","address2":"","phone":"727-798-0759","certificate_no":"012343","city":"St. Petersburg","email":"tomekpilot@gmail.com,","first_name":"Tomasz","last_name":"Brymora","notes":"some notes","state":"FL","zip":"33709","class":"Single Engine Land","display_email":true,"enabled":true,"password":"some password","username":"tomekpilot"},{"id":89,"address1":"123 Main St. South","address2":"Suite A","phone":"123-456-6789","certificate_no":"123000-B","city":"St. Petersburg","email":"c.l.@m.com","first_name":"Cecily","last_name":"Lyons","notes":"Notes placeholder","state":"FL","zip":"33998","class":"Class: WTF?","display_email":false,"enabled":true,"password":"cl-password","username":"cl-username"},{"id":90,"address1":"235 Boulevard St. South","address2":"Suite A","phone":"999-456-6789","certificate_no":"qewrwe-B","city":"London","email":"r.g.@mlb.com","first_name":"Rob","last_name":"Gilchrist","notes":"Notes placeholder","state":"FL","zip":"AB12","class":"Class: WTF?","display_email":false,"enabled":true,"password":"rg-password","username":"rg-username"},{"id":91,"address1":"123 Main St. South","address2":"Suite A","phone":"666-456-6789","certificate_no":"8976-B","city":"Nakajima","email":"M.Y.@nippon.com","first_name":"Misa","last_name":"Miguchi","notes":"Notes placeholder","state":"FL","zip":"AB-339","class":"Class: WTF?","display_email":false,"enabled":true,"password":"my-password","username":"my-username"}];
    console.dir( crewMembers );
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
