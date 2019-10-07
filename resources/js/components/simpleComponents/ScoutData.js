
import React, { Component } from 'react';

class ScoutPage extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
                this.handleChange = this.handleChange.bind(this);
                this.getScout = this.getScout.bind(this);
        }

        handleChange(event) {
                this.props.office(event.target.value);
        }

        getScout(event) {
                this.props.scoutId(event.target.value);
        }

        render() {
                return (
                        <div>
                                <div className="input-group my-1 scoutedBy">
                                        <div className="input-group-prepend">
                                                <span
                                                        className="input-group-text d-block new_talent_subscription_form">
                                                        Office:
                                        </span>
                                        </div>
                                        <select
                                                className="form-control"
                                                name="office" id="office"
                                                onChange={this.handleChange}
                                                defaultValue=''>
                                                <option value='' disabled>Please select the scout office</option>
                                                <option value="Montreal office">Montreal Office</option>
                                        </select>
                                </div>
                                <div className="input-group my-1 scoutedBy">
                                        <div className="input-group-prepend">
                                                <span
                                                        className="input-group-text d-block new_talent_subscription_form">
                                                        Scouted By:
                                        </span>
                                        </div>
                                        <select
                                                className="form-control"
                                                name="scouted"
                                                id="scouted"
                                                defaultValue=''
                                                onChange={this.getScout}>
                                                <option value='' disabled>Please select the scout...</option>
                                                {
                                                        this.props.list.map((scout) => <option value={scout._id} key={scout._id}>{scout.firstname} {scout.lastname}</option>)
                                                }
                                        </select>
                                </div>
                        </div>
                );
        }
}

export default ScoutPage;