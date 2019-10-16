
import React, { Component } from 'react';
import Input from './Input';

class Contact extends Component {
        constructor(props) {
                super(props);
                let contact = (this.props.contact == 'NA') ? 'NA' : this.props.contact;
                this.state = {
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
                        <fieldset className="border border-dark rounded p-3 my-3 shadow" id={this.props.isWho}>
                                <legend
                                        className="w-50 pl-2">
                                        <i className="fas fa-address-card text-info awsomeFonts">
                                        </i>  {this.props.isWho} Information
                                </legend>
                                <input type="text" hidden name="id" id="id" value='' readOnly />
                                {(this.props.isWho == 'applicant') ? '' : (
                                        <div className="input-group my-1">
                                                <div className="input-group-prepend">
                                                        <span
                                                                className="input-group-text d-block new_talent_subscription_form"
                                                                data-toggle="tooltip"
                                                                title="Guardian- Applicant Family Relationship">
                                                                <i className="fas fa-info-circle text-dark"></i>
                                                                &nbsp; Relation:
                                                        </span>
                                                </div>
                                                <select
                                                        name="guardian_relation"
                                                        id="guardian_relation"
                                                        className="form-control"
                                                        defaultValue=''>
                                                        <option value='' disabled>
                                                                Please select one of the below options
                                                        </option>
                                                        <option value='father'>Father</option>
                                                        <option value='mother'>Mother</option>
                                                        <option value='legal_guardian'>Legal Guardian</option>
                                                </select>
                                        </div>
                                )}
                                <Input title="firstName" setValue={this.setValue} />
                                <Input title="lastName" setValue={this.setValue} />
                                <Input title="email" setValue={this.setValue} />

                                <div className="input-group pt-2">
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

                                <div className="input-group pt-2">
                                        <div className="input-group-prepend">
                                                <span className="input-group-text d-block new_talent_subscription_form">Country:</span>
                                        </div>
                                        <select
                                                name="country"
                                                id="country"
                                                className="form-control countries"
                                                defaultValue=''
                                                onChange={this.handleChange}>
                                                <option
                                                        value=''
                                                        disabled>
                                                        Please select a country from the list
                                                        </option>
                                                {(this.props.countriesList) ? (this.props.countriesList.map((country, index) =>
                                                        <option
                                                                key={index}
                                                                value={country._id}>
                                                                {(this.state.language == 'english') ? country.en : country.fr}
                                                        </option>)
                                                ) :
                                                        (
                                                                ''
                                                        )
                                                }
                                        </select>
                                </div>
                                <div className="input-group pt-2">
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





