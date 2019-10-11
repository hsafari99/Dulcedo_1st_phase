
import React, { Component } from 'react';

class Remark extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
        }

        setNotes(event) {
                this.props.setNotes(event.target.value);
        }

        render() {
                return (
                        <div
                                className="input-group my-1">
                                <div
                                        className="input-group-prepend align-middle">
                                        <span
                                                className="input-group-text d-block new_talent_subscription_form">
                                                Remarks:
                                                </span>
                                </div>
                                <textarea
                                        type="text"
                                        name="notes"
                                        className="form-control"
                                        onChange={this.setNotes.bind(this)}>
                                </textarea>
                        </div>
                );
        }
}

export default Remark;