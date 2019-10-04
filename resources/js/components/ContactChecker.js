import React, {Component} from 'react';

class ContactChecker extends Component{
        constructor(props){
                super(props);
        }

        handleChange(){
                this.props.changeStatus();
        }

        render(){
                return (
                        <label 
                        htmlFor={this.props.isWho}
                        className="pl-4 showPointer">
                                <input 
                                        checked ={this.props.formDisplay}
                                        disabled = {this.props.formEnabled}
                                        type="checkbox" 
                                        className="form-check-input" 
                                        id={this.props.isWho}
                                        onChange={this.props.changeStatus}
                                />
                                <span 
                                className="font-weight-bold text-danger">
                                        Not a New {this.props.isWho}? Please click here to load the information
                                </span>
                        </label>
                );
        }
}

export default ContactChecker;