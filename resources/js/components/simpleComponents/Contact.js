
import React, { Component } from 'react';
import Input from './Input';

class Contact extends Component {
        constructor(props) {
                super(props);
                let applicant = (this.props.applicant == 'NA') ? 'NA' : this.props.applicant;
                console.log("Applicant: " + applicant);
                this.state = {
                        defaultCountry: 'CAN',
                }
                this.setValue = this.setValue.bind(this);
        }

        setValue(event, value) {
                this.setState({ [event]: value });
        }

        handleChange(event) {
                console.log("FRom Contact: " + event.target.value);
                this.setState({ id: event.target.value });
        }

        render() {
                return (
                        <fieldset className="border border-dark rounded p-3 my-3 shadow" id="Applicant">
                                <legend
                                        className="w-50 pl-2">
                                        <i className="fas fa-address-card text-info awsomeFonts">
                                        </i>  Personal Information
                                </legend>
                                <input type="text" hidden name='id' id="id" value='' readOnly />
                                <Input title="firstName" setValue={this.setValue} />
                                <Input title="lastName" setValue={this.setValue} />
                                <Input title="email" setValue={this.setValue} />

                                <div className="input-group my-1">
                                        <div className="input-group-prepend">
                                                <span className="input-group-text d-block new_talent_subscription_form">Phone:</span>
                                        </div>
                                        <input
                                                type="text"
                                                name="phone"
                                                list="phoneList"
                                                className="form-control"
                                                placeholder="Please select a number from list or add new phone number"
                                                onChange={this.handleChange}

                                        />
                                        <datalist id="phoneList"></datalist>
                                </div>
                                <Input title="address" setValue={this.setValue} />
                                <Input title="city" setValue={this.setValue} />
                                <Input title="postal" setValue={this.setValue} />

                                <div className="input-group my-1">
                                        <div className="input-group-prepend">
                                                <span className="input-group-text d-block new_talent_subscription_form">Country:</span>
                                        </div>
                                        <select
                                                name="country"
                                                id="country"
                                                className="form-control countries"
                                                defaultValue={this.state.defaultCountry}
                                                onChange={this.handleChange}>
                                        </select>
                                </div>
                                <div className="input-group my-1">
                                        <div className="input-group-prepend">
                                                <span className="input-group-text d-block new_talent_subscription_form">Birth Date:</span>
                                        </div>
                                        <input type="date" name="dob" id="dob" className="form-control" />
                                </div>
                        </fieldset>
                );
        }
}

export default Contact;





