import React, { Component } from 'react'

class OfficeSelctor extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
                this.handleChange = this.handleChange.bind(this);
        }



        handleChange(event) {
                this.props.setOffice(event.target.value);
        }

        render() {
                return (
                        <div
                                className="input-group my-1">
                                <div
                                        className="input-group-prepend">
                                        <span
                                                className="input-group-text d-block new_talent_subscription_form">
                                                Office:
                                                </span>
                                </div>
                                <select
                                        className="form-control scoutedBy"
                                        name="app_office"
                                        defaultValue=''
                                        onChange={this.handleChange}>
                                        <option
                                                value='' disabled>
                                                Please select the office creating the application
                                                </option>
                                        <option
                                                value="Montreal office">
                                                Montreal Office
                                                </option>
                                </select>
                        </div>
                );
        }

}

export default OfficeSelctor;