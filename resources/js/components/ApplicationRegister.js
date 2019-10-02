import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ContactChecker from './ContactChecker';
import ContactModal from './ContactModal';

export default class ApplicationRegister extends Component {
    constructor(props) {
    super(props);
    this.state = {
        applicantChecked: false,
        applicantEnabled: false,
        guardianChecked: false,
        guardianEnabled: false,
        isHidden: true,
        showModal: false,
        firstName : '',
        lastName  : '',
        email     : '',
        result    : ['na'],
    };

    this.changeStatus = this.changeStatus.bind(this);
    this.disableOther = this.disableOther.bind(this);
    this.handleChange = this.handleChange.bind(this);
    this.showContacts = this.showContacts.bind(this);
    }

    handleChange(event) {
        this.setState({
                [event.target.name]: event.target.value
        });
    }

    showContacts() {
        this.setState({showModal: true});
        var list = [];
        var firstName = this.state.firstName;
        var lastName  = this.state.lastName;
        var email     = this.state.email;
        $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/test",
                method: 'POST',
                data:{
                fname: firstName,
                lname: lastName,
                email: email
                },
                success: function(result){
                        var test = JSON.parse(result);
                        list = test;
                        console.log("Length: "+ test.length);
                }        
        });
        this.setState({result : list});
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
                <div id="searchContact" hidden = {this.state.isHidden}>
                    <fieldset 
                    className="border border-dark rounded p-3 my-3 shadow">
                    <legend 
                    className="w-50 pl-2 pl-5">
                            Search Contact
                    </legend>
                    <div className="input-group pt-2">
                            <div className="input-group-prepend">
                                    <span className="input-group-text d-block new_talent_subscription_form">First Name:</span>
                            </div>
                            <input type="text" className="form-control" name="firstName" onChange={this.handleChange} value={this.state.firstName}/>
                    </div>
                    <div className="input-group pt-2">
                            <div className="input-group-prepend">
                                    <span className="input-group-text d-block new_talent_subscription_form">Last Name:</span>
                            </div>
                            <input type="text" className="form-control" name="lastName" onChange={this.handleChange} value={this.state.lastName}/>
                    </div>
                    <div className="input-group pt-2">
                            <div className="input-group-prepend">
                                    <span className="input-group-text d-block new_talent_subscription_form">Email:</span>
                            </div>
                            <input type="email" className="form-control" name="email" onChange={this.handleChange} value={this.state.email}/>
                    </div>
                    <div className="input-group pt-2">
                            <span className="btn btn-info w-100" onClick={this.showContacts}>Search</span>
                    </div>
                    </fieldset>
                            
                </div>
                <ContactModal list={this.state.result} hiding={this.state.showModal}/>
            </div>
        );
    }
}

if (document.getElementById('AppRegister')) {
    ReactDOM.render(<ApplicationRegister/>, document.getElementById('AppRegister'));
}