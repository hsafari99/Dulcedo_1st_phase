import React, { Component } from 'react'

class GenderSelector extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
        }



        render() {
                return (
                        <div className="input-group my-1">
                                <div className="input-group-prepend">
                                        <span
                                                className="input-group-text d-block new_talent_subscription_form">
                                                Gender:
                                                </span>
                                </div>
                                <div
                                        className="form-control row m-0">
                                        <label htmlFor="male" className="col d-inline showPointer">
                                                <input
                                                        type="radio"
                                                        className="form-check-input"
                                                        id="male"
                                                        name="gender"
                                                        value="m" />
                                                <span
                                                        className="font-weight-bold text-secondary">
                                                        Male
                                                        </span>
                                        </label>
                                        <label htmlFor="female" className="col d-inline showPointer">
                                                <input
                                                        type="radio"
                                                        className="form-check-input"
                                                        id="female"
                                                        name="gender"
                                                        value="f" />
                                                <span
                                                        className="font-weight-bold text-secondary">
                                                        Female
                                                        </span>
                                        </label>
                                        <label htmlFor="other" className="col d-inline showPointer">
                                                <input
                                                        type="radio"
                                                        className="form-check-input"
                                                        id="other"
                                                        name="gender"
                                                        value="NA" />
                                                <span
                                                        className="font-weight-bold text-secondary">
                                                        Other
                                                        </span>
                                        </label>
                                </div>
                        </div>
                );
        }

}

export default GenderSelector;