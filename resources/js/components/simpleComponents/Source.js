
import React, { Component } from 'react';

class Source extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        list: [],
                }
                this.handleChange = this.handleChange.bind(this);
                this.getSource = this.getSource.bind(this);
        }

        handleChange(event) {
                this.props.setSourceNote(event.target.value);
        }

        getSource(event) {
                this.props.setSource(event.target.value);
        }

        render() {
                return (
                        <fieldset className="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
                                <legend className="w-50 pl-2">
                                        <i className="fab fa-hubspot text-danger awsomeFonts"></i>
                                        Source Information
                                </legend>
                                <div className="input-group my-1">
                                        <div className="input-group-prepend">
                                                <span
                                                        className="input-group-text d-block new_talent_subscription_form">
                                                        Source:
                                                </span>
                                        </div>
                                        <select
                                                className="form-control"
                                                name="source"
                                                id="source"
                                                defaultValue=''
                                                onChange={this.getSource}>
                                                <option value='' disabled>Please select the source...</option>
                                                {this.props.sourceList.map((source, index) => <option key={index} value={source._id}>{source.en}</option>)}
                                        </select>
                                </div>
                                <div className="input-group my-1">
                                        <div className="input-group-prepend">
                                                <span
                                                        className="input-group-text d-block new_talent_subscription_form">
                                                        Remarks:
                                                </span>
                                        </div>
                                        <textarea
                                                className="form-control"
                                                name="source_note"
                                                id="source_note" onChange={this.handleChange}
                                                value={this.state.value}>
                                        </textarea>
                                </div>
                        </fieldset>
                );
        }
}

export default Source;