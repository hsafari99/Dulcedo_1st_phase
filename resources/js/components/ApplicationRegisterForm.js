import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ContactChecker from './ContactChecker';
import SearchContact from './SearchContact';

export default class ApplicationRegisterForm extends Component {
    constructor(props) {
    super(props);
    this.state = {
        applicantChecked: false,
        applicantEnabled: false,
        guardianChecked: false,
        guardianEnabled: false,
        isHidden: true
    };

    this.changeStatus = this.changeStatus.bind(this);
    this.disableOther = this.disableOther.bind(this);
    }

    changeStatus(event){
        let component = event.target.id;
        if (component == 'applicant') {
            this.setState((state, props) => ({applicantChecked: !state.applicantChecked}));
            this.disableOther(component);
        }
        if (component == 'guardian') {
            this.setState((state, props) => ({guardianChecked : !state.guardianChecked}));
            this.disableOther(component);
        }  
        this.setState((state, props) => ({
            isHidden : !state.isHidden
        }));
    }

    disableOther(component){
        if(component == 'applicant'){
            if(!this.state.applicantChecked) {
                this.setState({guardianEnabled: true});
            }else{
                this.setState({guardianEnabled: false});
            }   
        }
        if (component == 'guardian') {
            if (!this.state.guardianChecked) {
                this.setState({applicantEnabled: true});
            }else{
                this.setState({applicantEnabled: false});
            }
        }
    }  

    render() {
        return (
            <div>
                <ContactChecker changeStatus={this.changeStatus} formDisplay={this.state.applicantChecked} formEnabled={this.state.applicantEnabled} isWho='applicant'/>
                <ContactChecker changeStatus={this.changeStatus} formDisplay={this.state.guardianChecked} formEnabled={this.state.guardianEnabled} isWho='guardian'/>
                <SearchContact isHidden={this.state.isHidden}/>
            </div>
        );
    }
}

if (document.getElementById('AppRegister')) {
    ReactDOM.render(<ApplicationRegisterForm/>, document.getElementById('AppRegister'));
}